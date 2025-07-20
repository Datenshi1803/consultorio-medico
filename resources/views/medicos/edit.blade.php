@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Médico</h2>

        <form method="POST" action="{{ route('medicos.update', $medico) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $medico->nombre) }}" class="form-control" oninput="sinNumeros(this)" maxlength="15">
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Apellido</label>
                <input type="text" name="apellido" value="{{ old('apellido', $medico->apellido) }}" class="form-control"  oninput="sinNumeros(this)" maxlength="15">
                @error('apellido')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fechanacimiento" value="{{ old('fechanacimiento', $medico->fechanacimiento) }}"
                       class="form-control">
                @error('fechanacimiento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Tipo de Sangre</label>
                <select name="tipo_sangre" class="form-control">
                    @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $tipo)
                        <option value="{{ $tipo }}" @selected(old('tipo_sangre', $medico->tipo_sangre) == $tipo)>
                            {{ $tipo }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_sangre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Especialidad</label>
                <select name="especialidad_id" class="form-control">
                    @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}" 
                            @selected(old('especialidad_id', $medico->especialidad_id) == $especialidad->id)>
                            {{ $especialidad->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('especialidad_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
