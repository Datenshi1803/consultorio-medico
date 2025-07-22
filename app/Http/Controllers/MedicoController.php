<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $medicos = Medico::with('especialidad')
            ->when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%$search%")
                             ->orWhere('apellido', 'like', "%$search%");
            })
            ->paginate(10);

        return view('medicos.index', compact('medicos', 'search'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        return view('medicos.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fechanacimiento' => 'required|date|before:today',
            'tipo_sangre' => ['required', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'especialidad_id' => 'required|exists:especialidades,id'
        ]);

        Medico::create($validated);

        return redirect()->route('medicos.index')->with('success', 'Médico creado correctamente');
    }

    public function edit(Medico $medico)
    {
        $especialidades = Especialidad::all();
        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    public function update(Request $request, Medico $medico)
    {
        $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'fechanacimiento' => 'required|date|before:today',
        'tipo_sangre' => ['required', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
        'especialidad_id' => 'required|integer', // <- SIN usar exists
    ]);

        $medico->update($validated);

        return redirect()->route('medicos.index')->with('success', 'Médico actualizado correctamente');
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();

        return redirect()->route('medicos.index')->with('success', 'Médico eliminado correctamente');
    }
}
