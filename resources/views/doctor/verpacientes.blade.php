<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
<nav class="navbar navbar-custom p-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-white">Lista de pacientes</span>
    </div>
</nav>

<div class="container mt-4">
    <h3 class="mb-4">Pacientes agendados</h3>
    @if(isset($pacientes) && count($pacientes) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Fecha de cita</th>
                        <th>Hora</th>
                        <th>Motivo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->nombre }}</td>
                            <td>{{ $paciente->telefono }}</td>
                            <td>{{ $paciente->fecha_cita }}</td>
                            <td>{{ $paciente->hora_cita }}</td>
                            <td>{{ $paciente->motivo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">No hay pacientes agendados para este doctor.</div>
    @endif
</div>

</body>
</html>