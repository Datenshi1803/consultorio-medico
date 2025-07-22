@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Horarios de Médicos</h1>
    <form method="GET" action="{{ route('schedules.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="doctor_id" class="form-control">
                    <option value="">-- Selecciona Médico --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="date" name="day" class="form-control" value="{{ request('day') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="{{ route('schedules.create') }}" class="btn btn-success">Nuevo Horario</a>
            </div>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Médico</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->doctor->name }}</td>
                    <td>{{ $schedule->day }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td>{{ $schedule->status }}</td>
                    <td>
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este horario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
