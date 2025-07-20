<?php

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


Route::get('/', function () {
    return view('welcome');
});
