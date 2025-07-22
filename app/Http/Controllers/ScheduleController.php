<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    // Listar y filtrar horarios
    public function index(Request $request)
    {
        $query = Schedule::with('doctor');
        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }
        if ($request->filled('day')) {
            $query->where('day', $request->day);
        }
        $schedules = $query->get();
        $doctors = Doctor::all();
        return view('schedules.index', compact('schedules', 'doctors'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $doctors = Doctor::all();
        return view('schedules.create', compact('doctors'));
    }

    // Guardar nuevo horario con validación
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'status' => 'required',
        ]);
        // Validación de fecha no adelantada
        if (strtotime($request->day) < strtotime(date('Y-m-d'))) {
            return back()->withErrors(['day' => 'La fecha debe ser igual o posterior a hoy.'])->withInput();
        }
        Schedule::create($request->all());
        return redirect()->route('schedules.index')->with('success', 'Horario creado correctamente');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $doctors = Doctor::all();
        return view('schedules.edit', compact('schedule', 'doctors'));
    }

    // Actualizar horario con validación
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'status' => 'required',
        ]);
        if (strtotime($request->day) < strtotime(date('Y-m-d'))) {
            return back()->withErrors(['day' => 'La fecha debe ser igual o posterior a hoy.'])->withInput();
        }
        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());
        return redirect()->route('schedules.index')->with('success', 'Horario actualizado correctamente');
    }

    // Eliminar horario
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Horario eliminado correctamente');
    }
}
 