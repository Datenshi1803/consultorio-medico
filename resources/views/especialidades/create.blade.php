@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Especialidad</h1>

    <form method="POST" action="{{ route('especialidades.store') }}">
        @csrf

        <div>
            <label>Descripción:</label><br>
            <input type="text" name="descripcion" value="{{ old('descripcion') }}" required>
            @error('descripcion')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Cantidad de Médicos:</label><br>
            <input type="number" name="cant_medicos" value="{{ old('cant_medicos', 0) }}" min="0" required>
            @error('cant_medicos')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Guardar</button>
        <a href="{{ route('especialidades.index') }}">Cancelar</a>
    </form>
</div>
@endsection
