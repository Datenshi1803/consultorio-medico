{{-- resources/views/usuario.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f7fb;
        }
        .main-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h4 {
            color: #1E88E5;
        }
    </style>
</head>
<body>

    {{-- Encabezado --}}
    <header class="text-white py-4 text-center" style="background-color: #1E88E5;">
        <h2 class="mb-0">Consultorio Médico Central</h2>
        <small class="d-block">Tu salud en buenas manos</small>
    </header>

    @if (Auth::check())
        {{-- Contenido si está autenticado --}}
        <div class="main-container text-center">
            <h4>Bienvenido, {{ Auth::user()->name }}</h4>

            <p class="mt-3">¿Qué deseas hacer hoy?</p>

            <div class="d-grid gap-2 col-6 mx-auto mt-4">
                <a href="/citas" class="btn btn-primary">Agendar Cita</a>
                <a href="/perfil" class="btn btn-primary">Perfil de Paciente</a>
                <a href="/logout" class="btn btn-outline-danger">Cerrar Sesión</a>
            </div>
        </div>
    @else
        {{-- Contenido si NO está autenticado --}}
        <div class="main-container text-center">
            <h4 class="text-danger">No estás autenticado</h4>
            <p>Por favor, <a href="{{ route('login') }}">inicia sesión</a> para continuar.</p>
        </div>
    @endif

</body>
</html>
