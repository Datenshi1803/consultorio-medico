<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function inicio()
    {
        $doctorId = auth()->user()->id ?? 1;  // Usa el id autenticado, o 1 para pruebas
        $doctor = \App\Models\Medico::find($doctorId);
        return view('doctor.inicio', compact('doctor'));
    }
}