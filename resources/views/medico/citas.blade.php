<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citas del Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Header -->
    <x-header />

    <main>
      <div class="container py-5">
          <h2 class="text-primary mb-4">Citas agendadas</h2>
          <form method="GET" class="mb-4">
              <label for="fecha" class="form-label">Ver citas del día:</label>
              <input type="date" name="fecha" id="fecha" value="{{ $fecha }}" class="form-control" style="max-width:200px;display:inline-block;">
              <button type="submit" class="btn btn-primary ms-2">Buscar</button>
          </form>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Hora</th>
                      <th>Paciente</th>
                      <th>Motivo</th>
                      <th>Estado</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($citas as $cita)
                      <tr>
                          <td>{{ \Carbon\Carbon::parse($cita->hora)->format('H:i') }}</td>
                          <td>{{ $cita->paciente->nombre1 }} {{ $cita->paciente->apellido1 }}</td>
                          <td>{{ $cita->motivo }}</td>
                          <td>{{ $cita->estado }}</td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="4">No hay citas para este día.</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
    </main>

    <!-- Footer -->
    <x-footer />
</body>
</html>