<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorCitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorCitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\CitaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});













Route::get('/doctor/inicio', [App\Http\Controllers\DoctorController::class, 'inicio'])->name('doctor.inicio');

Route::get('/doctor/citas', [App\Http\Controllers\DoctorCitaController::class, 'index'])->name('doctor.citas');

Route::get('/doctor/horario', [App\Http\Controllers\HorarioController::class, 'horario'])->name('doctor.horario');