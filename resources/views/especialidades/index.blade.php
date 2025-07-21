@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4 d-flex justify-content-between align-items-center">
            Lista de Especialidades
            <a href="{{ route('especialidades.create') }}" class="btn btn-success">+ Nueva Especialidad</a>
        </h2>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('especialidades.index') }}" class="mb-4">
            <div style="display: flex; gap: 10px;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por descripción"
                    class="form-control" style="flex:1;">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabla de especialidades -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Cantidad de Médicos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($especialidades as $esp)
                    <tr>
                        <td>{{ $esp->descripcion }}</td>
                        <td>{{ $esp->cant_medicos }}</td>
                        <td>
                            <a href="{{ route('especialidades.edit', $esp) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('especialidades.destroy', $esp) }}" method="POST"
                                style="display:inline-block;"
                                onsubmit="return confirm('¿Estás seguro de eliminar esta especialidad?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No se encontraron especialidades.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $especialidades->links() }}
        </div>
    </div>
@endsection
