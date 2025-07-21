<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorCitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [PacienteController::class, 'show'])->name('paciente.perfil');
    Route::put('/perfil', [PacienteController::class, 'update'])->name('paciente.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::post('/notificaciones/{id}/leida', [NotificacionController::class, 'marcarComoLeida'])->name('notificaciones.leida');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/doctor/inicio', [DoctorController::class, 'inicio'])->name('doctor.inicio');
    Route::get('/doctor/citas', [DoctorCitaController::class, 'index'])->name('doctor.citas');
    Route::get('/doctor/horario', [HorarioController::class, 'horario'])->name('doctor.horario');
});













Route::get('/doctor/inicio', [App\Http\Controllers\DoctorController::class, 'inicio'])->name('doctor.inicio');

Route::get('/doctor/citas', [App\Http\Controllers\DoctorCitaController::class, 'index'])->name('doctor.citas');

Route::get('/doctor/horario', [App\Http\Controllers\HorarioController::class, 'horario'])->name('doctor.horario');