<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horario del Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- Header -->
    <x-header />

    <main>
        <div class="container mt-5">
            <h2 class="text-start text-primary mb-4">Horario Semanal</h2>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-header-blue">
                        <tr>
                            <th>Día</th>
                            <th>Hora de Entrada</th>
                            <th>Hora de Almuerzo</th>
                            <th>Hora de Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($horarios as $horario)
                            <tr>
                                <td>{{ $horario->dia_semana }}</td>
                                <td>{{ \Carbon\Carbon::parse($horario->hora_entrada)->format('h:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($horario->inicio_almuerzo)->format('h:i A') }} - {{ \Carbon\Carbon::parse($horario->fin_almuerzo)->format('h:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($horario->hora_salida)->format('h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <x-footer />
</body>
</html>
