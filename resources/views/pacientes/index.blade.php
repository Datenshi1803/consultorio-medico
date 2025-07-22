@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Pacientes</h2>
    <a href="{{ route('pacientes.create') }}" class="btn btn-success">Crear nuevo paciente</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="GET" action="{{ route('pacientes.index') }}" class="mb-4">
    <div class="input-group">
        <input type="text" name="busqueda" value="{{ request('busqueda') }}" class="form-control" placeholder="Buscar paciente...">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

<table class="table table-striped table-bordered">
    <thead class="table-primary">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th style="width: 180px;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->nombre1 }} {{ $paciente->apellido1 }}</td>
            <td>{{ $paciente->correo }}</td>
            <td>{{ $paciente->telefono_principal }}</td>
            <td>
                <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este paciente?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">No hay pacientes registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $pacientes->links() }}
</div>
@endsection
