{{-- resources/views/usuario.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #e3f2fd;
            font-family: Arial, sans-serif;
        }
        .main-container {
            max-width: 800px;
            margin: 60px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        h4 {
            color: #1E88E5;
        }
        .welcome-img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        .btn-circle {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            font-size: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: #1E88E5;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .btn-circle:hover {
            background-color: #1565c0;
        }
        .top-buttons {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
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
        {{-- Botones superiores --}}
        <div class="top-buttons">
            <a href="{{ route('notificaciones.index') }}" class="btn btn-success position-relative">
                Notificaciones
                @if (isset($notificacionesNoLeidas) && $notificacionesNoLeidas > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $notificacionesNoLeidas }}
                    </span>
                @endif
            </a>
            <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
        </div>

        {{-- Contenido si está autenticado --}}
        <div class="main-container">
            <img src="https://cdn.pixabay.com/photo/2017/08/06/22/01/doctors-2596229_1280.jpg" alt="Bienvenida" class="welcome-img">

            <h4>Bienvenido, {{ Auth::user()->name }}</h4>
            <p class="mt-3">Selecciona una opción:</p>
<div class="action-buttons">
    <a href="/perfil" class="btn btn-circle text-white">
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-user fa-2x mb-2"></i>
            <span>Ver Perfil</span>
        </div>
    </a>

    <a href="/citas" class="btn btn-circle text-white">
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-calendar-plus fa-2x mb-2"></i>
            <span>Agendar Citas</span>
        </div>
    </a>

    <a href="/agendar" class="btn btn-circle text-white">
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-calendar-check fa-2x mb-2"></i>
            <span>Ver Citas</span>
        </div>
    </a>
</div>


        </div>
    @else
        {{-- Contenido si NO está autenticado --}}
        <div class="main-container">
            <h4 class="text-danger">No estás autenticado</h4>
            <p>Por favor, <a href="{{ route('login') }}">inicia sesión</a> para continuar.</p>
        </div>
    @endif

</body>
</html>
