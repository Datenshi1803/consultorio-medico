<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Doctor - Consultorio Médico Central</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Header -->
    <x-header />

    <main>
        <!-- Hero Section personalizada -->
        <section class="hero">
            <div class="container">
                <h3 class="text-primary fw-bold">Bienvenido, Dr. {{ $doctor->nombre }} {{ $doctor->apellido }}</h3>
                <p class="text-muted">Desde este panel puedes gestionar tus citas, revisar tu horario de trabajo y estar al tanto de tus responsabilidades médicas.</p>
            </div>
        </section>

        <!-- Features -->
        <section class="py-5 tarjetas-container">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <a href="{{ route('doctor.citas') }}" class="card-link">
                            <div class="feature-box text-center">
                                <h5>Ver Citas</h5>
                                <p>Consulta todas tus citas agendadas con pacientes.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('doctor.horario') }}" class="card-link">
                            <div class="feature-box text-center">
                                <h5>Ver Horario de Trabajo</h5>
                                <p>Revisa tus turnos y jornadas asignadas.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
