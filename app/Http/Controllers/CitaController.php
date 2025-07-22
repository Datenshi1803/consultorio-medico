<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Paciente;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index()
{
    $paciente = Auth::user()->paciente;

    if (!$paciente) {
        return back()->with('error', 'Este usuario no tiene perfil de paciente.');
    }

    $citas = Cita::where('paciente_id', $paciente->id)
                ->where('fecha', '>=', now()->toDateString())
                ->orderBy('fecha')
                ->get();

    return view('paciente.citas', compact('citas'));
}

}
