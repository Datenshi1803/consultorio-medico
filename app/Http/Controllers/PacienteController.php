<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');

        $pacientes = Paciente::when($busqueda, function ($query, $busqueda) {
            return $query->where('nombre1', 'like', "%$busqueda%")
                         ->orWhere('apellido1', 'like', "%$busqueda%")
                         ->orWhere('correo', 'like', "%$busqueda%");
        })->paginate(10);

        return view('pacientes.index', compact('pacientes', 'busqueda'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $this->validarPaciente($request);

        // Asignar el usuario_id automáticamente
        $data = $request->only([
            'nombre1', 'nombre2', 'apellido1', 'apellido2',
            'fechadenacimiento', 'tipo_sangre', 'padecimientos_anteriores',
            'predisposiciones', 'genero', 'telefono_principal',
            'telefono_emergencia', 'correo', 'direccion',
            'alergias', 'medicamentos', 'historial_cirugias'
        ]);

       // Evitar error asignando un usuario_id fijo o el id de usuario logueado
        $data['usuario_id'] = auth()->id() ?? 3;

        Paciente::create($data);

        return redirect()->route('pacientes.index')->with('success', 'Paciente creado correctamente.');
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $this->validarPaciente($request, $paciente->id);

        // No actualizamos usuario_id para evitar conflictos
        $data = $request->only([
            'nombre1', 'nombre2', 'apellido1', 'apellido2',
            'fechadenacimiento', 'tipo_sangre', 'padecimientos_anteriores',
            'predisposiciones', 'genero', 'telefono_principal',
            'telefono_emergencia', 'correo', 'direccion',
            'alergias', 'medicamentos', 'historial_cirugias'
        ]);

        $paciente->update($data);

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente.');
    }

    private function validarPaciente(Request $request, $id = null)
    {
        $request->validate([
            'nombre1' => 'required|string|max:50',
            'nombre2' => 'nullable|string|max:50',
            'apellido1' => 'required|string|max:50',
            'apellido2' => 'nullable|string|max:50',
            'correo' => 'required|email|max:100|unique:pacientes,correo,' . $id,
            'fechadenacimiento' => 'required|date|before:today',
            'telefono_principal' => 'required|digits_between:7,15',
            'telefono_emergencia' => 'nullable|digits_between:7,15',
            'tipo_sangre' => 'nullable|string|max:3',
            'padecimientos_anteriores' => 'nullable|string|max:255',
            'predisposiciones' => 'nullable|string|max:255',
            'genero' => 'required|in:Masculino,Femenino,Otro',
            'direccion' => 'nullable|string|max:255',
            'alergias' => 'nullable|string|max:255',
            'medicamentos' => 'nullable|string|max:255',
            'historial_cirugias' => 'nullable|string|max:255',
        ]);
    }
}