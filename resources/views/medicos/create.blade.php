@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Médico</h2>

    <form method="POST" action="{{ route('medicos.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" oninput="sinNumeros(this)" maxlength="15">
            @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control"   oninput="sinNumeros(this)" maxlength="15">
            @error('apellido') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fechanacimiento" value="{{ old('fechanacimiento') }}" class="form-control">
            @error('fechanacimiento') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Tipo de Sangre</label>
            <select name="tipo_sangre" class="form-control">
                <option value="" disabled>Seleccione tipo de sangre</option>
                @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $tipo)
                    <option value="{{ $tipo }}" @selected(old('tipo_sangre') == $tipo)>
                        {{ $tipo }}
                    </option>
                @endforeach
            </select>
            @error('tipo_sangre') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Especialidad</label>
            <select name="especialidad_id" class="form-control">
                <option value=""disabled>Seleccione especialidad</option>
                @foreach ($especialidades as $esp)
                    <option value="{{ $esp->id }}" @selected(old('especialidad_id') == $esp->id)>
                        {{ $esp->descripcion }}
                    </option>
                @endforeach
            </select>
            @error('especialidad_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar Médico</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
