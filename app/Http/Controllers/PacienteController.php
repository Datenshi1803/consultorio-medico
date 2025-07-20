<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    public function show()
    {
        $paciente = Paciente::where('usuario_id', Auth::id())->firstOrFail();
        return view('paciente.perfil', compact('paciente'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'alergias' => 'nullable|string|max:255',
            'padecimientos' => 'nullable|string|max:255',
            'predisposiciones' => 'nullable|string|max:255',
            'medicamentos' => 'nullable|string|max:255',
            'historial_cirugias' => 'nullable|string|max:255',
        ]);

        $paciente = Paciente::where('usuario_id', Auth::id())->firstOrFail();
        $paciente->update($request->only([
            'alergias', 'padecimientos', 'predisposiciones', 'medicamentos', 'historial_cirugias'
        ]));

        return redirect()->route('paciente.perfil')->with('success', 'Perfil actualizado correctamente.');
    }
}