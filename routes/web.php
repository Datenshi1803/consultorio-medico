<?php
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;  // <-- Agrega esto
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorCitaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\caPacienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas web para tu aplicación.
|
*/

// RUTAS PÚBLICAS
Route::get('/', function () {
    return view('landing');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.custom');

// RUTAS PROTEGIDAS POR AUTENTICACIÓN
Route::middleware(['auth'])->group(function () {

    // PACIENTE
    Route::view('/inicio-paciente', 'paciente.usuario')->name('paciente.inicio');
    Route::view('/paciente/citas', 'paciente.citas')->name('paciente.citas');
    Route::view('/paciente/notificaciones', 'paciente.notificaciones')->name('paciente.notificaciones');
    Route::view('/paciente/perfil', 'paciente.perfil')->name('paciente.perfil');

    // MÉDICO
    Route::view('/inicio-medico', 'medico.inicio')->name('medico.inicio');
    Route::view('/medico/citas', 'medico.citas')->name('medico.citas');
    Route::view('/medico/horario', 'medico.horario')->name('medico.horario');
    Route::view('/medico/notificaciones', 'medico.notificaciones')->name('medico.notificaciones');
    Route::view('/medico/ver-pacientes', 'medico.verpacientes')->name('medico.verpacientes');

    // ADMIN (vista principal del panel)
    Route::view('/inicio-admin', 'admin.inicio')->name('admin.inicio');

    // Subgrupo para rutas admin
        Route::resource('pacientes', PacienteController::class)->except(['show']);
        Route::resource('medicos', MedicoController::class);
        Route::resource('especialidades', EspecialidadController::class);
        Route::resource('schedules', HorarioController::class);

        // Ruta para exportar citas
        Route::get('/citas/exportar', [CitaController::class, 'exportar'])->name('citas.exportar');

    // NOTIFICACIONES compartidas
    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::post('/notificaciones/{id}/leida', [NotificacionController::class, 'marcarComoLeida'])->name('notificaciones.leida');

    // PERFIL paciente (desde controlador)
    Route::get('/perfil', [caPacienteController::class, 'show'])->name('paciente.perfil.controller');
    Route::put('/perfil', [caPacienteController::class, 'update'])->name('paciente.update');

    // CITAS generales
    Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');

    // DOCTOR desde controladores
    Route::get('/doctor/inicio', [DoctorController::class, 'inicio'])->name('doctor.inicio');
    Route::get('/doctor/citas', [DoctorCitaController::class, 'index'])->name('doctor.citas');
    Route::get('/doctor/horario', [HorarioController::class, 'horario'])->name('doctor.horario');
    Route::view('/doctor/notificaciones', 'doctor.notificaciones')->name('doctor.notificaciones');
    Route::view('/doctor/ver-pacientes', 'doctor.verpacientes')->name('doctor.verpacientes');

    // Logout
    Route::get('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    })->name('logout');

    Route::get('/redirigir-a-pacientes', function () {
        return redirect()->route('admin.pacientes.index');
    });
});

