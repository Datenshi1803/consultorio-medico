@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Especialidad</h2>

        <form method="POST" action="{{ route('especialidades.update', $especialidad) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Descripción</label>
                <input type="text" name="descripcion" value="{{ old('descripcion', $especialidad->descripcion) }}"
                    class="form-control" maxlength="50">
                @error('descripcion')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Cantidad de Médicos</label>
                <input type="number" name="cant_medicos" value="{{ old('cant_medicos', $especialidad->cant_medicos) }}"
                    class="form-control" min="0">
                @error('cant_medicos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
