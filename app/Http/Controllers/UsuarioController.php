<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Notificacion;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        $notificacionesNoLeidas = Notificacion::where('paciente_id', Auth::id())
                                      ->where('leido', false)
                                      ->count();


         return view('paciente.usuario', compact('notificacionesNoLeidas'));

    }
}
