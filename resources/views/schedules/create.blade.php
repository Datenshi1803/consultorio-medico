@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Nuevo Horario de Médico</h1>
    <form method="POST" action="{{ route('schedules.store') }}">
        @csrf
        <div class="mb-3">
            <label for="doctor_id" class="form-label">Médico</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="">-- Selecciona Médico --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
            @error('doctor_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="day" class="form-label">Día</label>
            <input type="date" name="day" id="day" class="form-control" required>
            @error('day')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Hora Inicio</label>
            <input type="time" name="start_time" id="start_time" class="form-control" required>
            @error('start_time')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">Hora Fin</label>
            <input type="time" name="end_time" id="end_time" class="form-control" required>
            @error('end_time')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
            @error('status')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
