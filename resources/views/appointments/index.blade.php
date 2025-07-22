@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Citas</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient_name ?? '' }}</td>
                    <td>{{ $appointment->doctor->name ?? '' }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>
                        <a href="{{ route('appointments.exportJson', $appointment->id) }}" class="btn btn-info btn-sm" target="_blank">Exportar JSON</a>
                        <!-- ...otros botones... -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
