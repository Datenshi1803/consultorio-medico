<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    public function index()
    {
        $notificaciones = Notificacion::where('paciente_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notificaciones', compact('notificaciones'));
    }

    public function marcarComoLeida($id)
    {
        $notificacion = Notificacion::findOrFail($id);
        $notificacion->leido = 1;
        $notificacion->save();

        return redirect()->route('notificaciones.index');
    }
}
