@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4 d-flex justify-content-between align-items-center">
            Lista de Médicos
            <a href="{{ route('medicos.create') }}" class="btn btn-success">+ Nuevo Médico</a>
        </h2>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('medicos.index') }}" class="mb-4">
            <div style="display: flex; gap: 10px;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por nombre o apellido"
                    class="form-control" style="flex:1;">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabla de médicos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Tipo de Sangre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($medicos as $medico)
                    <tr>
                        <td>{{ $medico->nombre }}</td>
                        <td>{{ $medico->apellido }}</td>
                        <td>{{ \Carbon\Carbon::parse($medico->fechanacimiento)->format('d/m/Y') }}</td>
                        <td>{{ $medico->tipo_sangre }}</td>
                        <td>
                            <a href="{{ route('medicos.edit', $medico) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('medicos.destroy', $medico) }}" method="POST"
                                style="display:inline-block;"
                                onsubmit="return confirm('¿Estás seguro de eliminar este médico?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No se encontraron médicos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $medicos->links() }}
        </div>
    </div>
@endsection
