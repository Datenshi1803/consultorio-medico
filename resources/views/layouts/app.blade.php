<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Consultorio Médico Central</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .bg-header-top {
            background-color: #1E90FF;
            color: white;
        }

        .bg-header-bottom {
            background-color: #003E91;
        }

        .nav-link {
            color: white !important;
            font-weight: 600;
        }

        .main-title {
            font-weight: bold;
            color: #1E90FF;
        }

        .btn-ingresar {
            background-color: #28a745;
            color: white;
            font-weight: 500;
        }

        .btn-ingresar:hover {
            background-color: #218838;
        }

        .info-section {
            background-color: #E6F2FF;
        }

        .card-info {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        footer {
            background-color: #003E91;
            color: white;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- HEADER -->
    <div class="bg-header-top py-3 text-center">
        <h2 class="fw-bold">Consultorio Médico Central</h2>
        <p class="mb-0">Tu salud en buenas manos</p>
    </div>

    <!-- NAVBAR -->
    <nav class="bg-header-bottom">
        <div class="container d-flex justify-content-center py-2">
            <a class="nav-link px-3" href="{{ route('admin.inicio') }}">Inicio</a>
            <a class="nav-link px-3" href="#">Citas</a>
            <a class="nav-link px-3" href="#">Especialistas</a>
            <a class="nav-link px-3" href="#">Contacto</a>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-grow-1 container py-5">
        @yield('content')
    </main>

    <!-- FOOTER FIJO AL FONDO -->
    <footer class="text-center py-3 bg-header-bottom text-white">
        <p class="mb-0">© 2025 Consultorio Médico Central - Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
