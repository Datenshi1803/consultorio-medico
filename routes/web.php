<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorCitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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

    // ADMIN
    Route::view('/inicio-admin', 'admin.inicio')->name('admin.inicio');

    // NOTIFICACIONES compartidas
    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::post('/notificaciones/{id}/leida', [NotificacionController::class, 'marcarComoLeida'])->name('notificaciones.leida');

    // PERFIL paciente (desde controlador)
    Route::get('/perfil', [PacienteController::class, 'show'])->name('paciente.perfil.controller');
    Route::put('/perfil', [PacienteController::class, 'update'])->name('paciente.update');

    // CITAS generales
    Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');

    // DOCTOR desde controladores
    Route::get('/doctor/inicio', [DoctorController::class, 'inicio'])->name('doctor.inicio');
    Route::get('/doctor/citas', [DoctorCitaController::class, 'index'])->name('doctor.citas');
    Route::get('/doctor/horario', [HorarioController::class, 'horario'])->name('doctor.horario');

    Route::get('/logout', function () {
    Auth::logout();                     // Cierra sesión
    session()->invalidate();           // Invalida la sesión
    session()->regenerateToken();      // Regenera el token CSRF
    return redirect()->route('login');

    })->name('logout');


Route::middleware(['auth'])->get('/usuario', [UsuarioController::class, 'index'])->name('usuario');

});
