<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Especialidad::query();

        if ($request->filled('search')) {
            $query->where('descripcion', 'like', '%' . $request->search . '%');
        }

        $especialidades = $query->paginate(10);

        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'cant_medicos' => 'required|integer|min:0',
        ]);

        Especialidad::create($request->all());

        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.show', compact('especialidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.edit', compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'cant_medicos' => 'required|integer|min:0',
        ]);

        $especialidad = Especialidad::findOrFail($id);
        $especialidad->update($request->all());

        return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();

        return redirect()->route('especialidades.index')->with('success', 'Especialidad eliminada correctamente.');
    }
}
