<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Carbon\Carbon;

class DoctorCitaController extends Controller
{
    public function index(Request $request)
    {
        $doctorId = auth()->user()->id ?? 1; // Usa el id autenticado, o 1 para pruebas
        $fecha = $request->input('fecha', Carbon::today()->toDateString());

        $citas = Cita::where('medico_id', $doctorId)
            ->whereDate('fecha', $fecha)
            ->with('paciente')
            ->orderBy('hora')
            ->get();

        return view('doctor.citas', compact('citas', 'fecha'));
    }
}