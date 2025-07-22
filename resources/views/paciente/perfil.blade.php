<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #E3F2FD; }
        .btn-primary { background-color: #1E88E5; border-color: #1E88E5; }
        .btn-primary:hover { background-color: #1565C0; }
        .text-muted { color: #9E9E9E !important; }
        .card { background-color: #FFFFFF; }
        .form-label { font-weight: 600; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark" style="background-color: #0D47A1;">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Perfil del Paciente</span>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success" style="background-color: #43A047; color: white;">
                {{ session('success') }}
            </div>
        @endif

        <div class="card p-4 shadow">
            <form method="POST" action="{{ route('paciente.update') }}">
                @csrf
                @method('PUT')

                @foreach (['nombre1','nombre2','apellido1','apellido2','fechadenacimiento','tipo_sangre','padecimientos_anteriores','predisposiciones','genero','telefono_principal','telefono_emergencia','correo','direccion','alergias','medicamentos','historial_cirugias'] as $campo)
                    <div class="mb-3">
                        <label class="form-label text-muted text-capitalize" for="{{ $campo }}">{{ ucfirst($campo) }}</label>
                        <input type="text" id="{{ $campo }}" name="{{ $campo }}" value="{{ $paciente->$campo }}" class="form-control">
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Actualizar perfil</button>
                <a href="{{ route('paciente.inicio') }}" class="btn btn-secondary ms-2"style="background-color: #1E88E5;">← Regresar</a>
            </form>
        </div>
    </div>
</body>
</html>
