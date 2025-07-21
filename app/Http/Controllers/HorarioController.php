<?php

namespace App\Http\Controllers;
use App\Models\Horario;

class HorarioController extends Controller
{
  public function horario()
  {
      $doctorId = auth()->user()->id ?? 1;  // Usa el id autenticado, o 1 para pruebas
      $horarios = Horario::where('medico_id', $doctorId)->get();
      return view('doctor.horario', compact('horarios'));
  }
}