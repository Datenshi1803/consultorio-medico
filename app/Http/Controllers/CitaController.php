<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::where('paciente_id', Auth::id())
            ->where('fecha', '>=', now()->toDateString())
            ->orderBy('fecha')
            ->get();

        return view('citas', compact('citas'));
    }
}
