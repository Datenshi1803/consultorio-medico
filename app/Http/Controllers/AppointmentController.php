<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // ...existing code...
    // Exportar cita en formato JSON
    public function exportJson($id)
    {
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment);
    }
    // ...existing code...
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            // ...otros campos...
        ]);

        // Verificar disponibilidad del médico
        $doctorId = $request->doctor_id;
        $date = $request->date;
        $time = $request->time;

        // Verificar si el médico tiene un horario disponible en ese día y hora
        $schedule = \App\Models\Schedule::where('doctor_id', $doctorId)
            ->where('day', $date)
            ->where('start_time', '<=', $time)
            ->where('end_time', '>=', $time)
            ->where('status', 'activo')
            ->first();

        if (!$schedule) {
            return back()->withErrors(['time' => 'El médico no está disponible en ese horario.'])->withInput();
        }

        // Verificar si ya tiene una cita en ese horario
        $exists = \App\Models\Appointment::where('doctor_id', $doctorId)
            ->where('date', $date)
            ->where('time', $time)
            ->exists();
        if ($exists) {
            return back()->withErrors(['time' => 'El médico ya tiene una cita en ese horario.'])->withInput();
        }

        // Opcional: Verificar hora de almuerzo (ejemplo: 13:00-14:00)
        if ($time >= '13:00' && $time < '14:00') {
            return back()->withErrors(['time' => 'No se pueden agendar citas en la hora de almuerzo.'])->withInput();
        }

        // ...guardar la cita...
        \App\Models\Appointment::create($request->all());
        return redirect()->route('appointments.index')->with('success', 'Cita agendada correctamente');
    }
}