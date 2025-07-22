<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #E3F2FD; }
        .card { background-color: #FFFFFF; }
        .text-muted { color: #9E9E9E !important; }
        .border-blue { border-left: 5px solid #1E88E5; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark" style="background-color: #0D47A1;">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Citas Agendadas</span>
        </div>
    </nav>

    <div class="container mt-4">
        @if ($citas->isEmpty())
            <div class="alert alert-info">No tienes citas registradas.</div>
        @else
            @foreach ($citas as $cita)
                <div class="card border-blue mb-3 p-3 shadow-sm">
                    <p><strong>Medico:</strong> {{ $cita->medico->nombre }}</p>
                    <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
                    <p><strong>Hora:</strong> {{ $cita->hora }}</p>
                    <p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
                    <p><strong>Estado:</strong> {{ $cita->estado }}</p>
                </div>

            @endforeach
        @endif
         <div class="text-center mt-4">
            <a href="{{ route('paciente.inicio') }}" class="btn btn-primary" style="background-color: #1E88E5;">← Regresar</a>
        </div>
    </div>
</body>
</html>
