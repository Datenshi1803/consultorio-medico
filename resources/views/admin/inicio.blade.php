<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Administrador - Consultorio Médico Central</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Header -->
    <x-header />

    <main>
        <!-- Hero Section personalizada -->
        <section class="hero py-5 bg-light border-bottom">
            <div class="container">
                <h2 class="text-primary fw-bold mb-3">Bienvenido al Panel de Administración</h2>
                <p class="text-muted fs-5">Desde este panel puedes gestionar toda la información del consultorio médico central. Selecciona una opción para comenzar:</p>
            </div>
        </section>

        <!-- Opciones de administración -->
        <section class="py-5 tarjetas-container">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <a href="{{ route('admin.pacientes.index') }}" class="card-link">
                            <div class="feature-box text-center border rounded p-4 bg-white h-100 shadow-sm">
                                <h5>Pacientes</h5>
                                <p>Gestiona el registro, edición y eliminación de pacientes.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.medicos.index') }}" class="card-link">
                            <div class="feature-box text-center border rounded p-4 bg-white h-100 shadow-sm">
                                <h5>Médicos</h5>
                                <p>Administra la información de los médicos del consultorio.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.especialidades.index') }}" class="card-link">
                            <div class="feature-box text-center border rounded p-4 bg-white h-100 shadow-sm">
                                <h5>Especialidades</h5>
                                <p>Agrega, edita o elimina especialidades médicas.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.horarios.index') }}" class="card-link">
                            <div class="feature-box text-center border rounded p-4 bg-white h-100 shadow-sm">
                                <h5>Horarios</h5>
                                <p>Gestiona los horarios de trabajo de los médicos.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.citas.exportar') }}" class="card-link">
                            <div class="feature-box text-center border rounded p-4 bg-white h-100 shadow-sm">
                                <h5>Exportar Citas</h5>
                                <span class="badge bg-success">Exportar</span>
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
