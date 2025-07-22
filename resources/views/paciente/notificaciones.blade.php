<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buzón de Notificaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #E3F2FD; }
        .inbox-container { max-width: 900px; margin: auto; margin-top: 30px; }
        .inbox-item {
            background-color: #FFFFFF;
            border-left: 6px solid #1E88E5;
            padding: 15px 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            display: flex;
            align-items: flex-start;
            transition: background 0.2s ease-in-out;
        }
        .inbox-item.unread {
            background-color: #FFF8E1;
            border-left-color: #FFC107;
        }
        .inbox-icon {
            font-size: 30px;
            margin-right: 20px;
            color: #1E88E5;
        }
        .inbox-content {
            flex: 1;
        }
        .inbox-date {
            font-size: 14px;
            color: #9E9E9E;
        }
        .inbox-actions {
            text-align: right;
            min-width: 130px;
        }
        .btn-sm {
            font-size: 0.75rem;
        }
        .navbar-custom {
            background-color: #0D47A1;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-custom p-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-white">📨 Buzón de Notificaciones</span>
    </div>
</nav>

<div class="inbox-container">
    @forelse ($notificaciones as $notificacion)
        @php
            $origen = $notificacion->tipo == 'medico' ? 'del médico' : 'del sistema';
        @endphp

        <div class="inbox-item {{ !$notificacion->leido ? 'unread' : '' }}">
            <div class="inbox-icon">📬</div>

            <div class="inbox-content">
                <h5 class="mb-1 text-primary">Notificación {{ $origen }}</h5>
                <div class="inbox-date mb-2">📅 {{ $notificacion->fechadenotificacion }}</div>
                <p>{{ $notificacion->mensaje ?? 'Mensaje no disponible.' }}</p>
            </div>

            <div class="inbox-actions">
                @if (!$notificacion->leido)
                    <form method="POST" action="{{ route('notificaciones.leida', $notificacion->id) }}">
                        @csrf
                        <button class="btn btn-sm btn-success">Marcar como leída</button>
                    </form>
                @else
                    <span class="badge bg-secondary">Leída</span>
                @endif
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">No tienes notificaciones en este momento.</div>
    @endforelse
</div>

</body>
</html>
