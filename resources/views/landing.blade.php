<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultorio Médico Central</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            padding: 60px 20px;
            text-align: center;
        }
        .cta-btn {
            margin-top: 20px;
        }
        .info-box {
            padding: 20px;
            border-radius: 8px;
            background-color: #FFFFFF;
            height: 100%;
        }
        footer {
            background-color: #0D47A1;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 40px;
        }
        h5, p {
            color: #1E88E5;
        }
        
    </style>
</head>
<body>

   <!-- Encabezado -->
<header class="text-white py-4 text-center" style="background-color: #1E88E5;" >
    <h2 class="mb-0">Consultorio Médico Central</h2>
    <small class="d-block">Tu salud en buenas manos</small>
</header>

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004085;">
    <div class="container">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Citas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Especialistas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2 class="text-primary">Agenda tu cita de manera rápida y segura</h2>
            <p class="mt-3" style="color: gray">Desde nuestra plataforma podrás gestionar tus consultas médicas con facilidad, consultar tu historial y recibir notificaciones importantes.</p>
            <a href="login" class="btn btn-success cta-btn">Ingresar al sistema</a>
        </div>
    </section>

    <!-- Info Boxes -->
    <div class="container mt-5" style="background-color: #E3F2FD;">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="info-box text-center">
                    <h5>Agendamiento en línea</h5>
                    <p>Elige el médico, día y hora desde cualquier dispositivo.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box text-center">
                    <h5>Seguimiento de citas</h5>
                    <p>Consulta el estado de tus próximas atenciones.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box text-center">
                    <h5>Historial clínico</h5>
                    <p>Accede a tus datos de salud de manera segura y privada.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>© 2025 Consultorio Médico Central - Todos los derechos reservados.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
