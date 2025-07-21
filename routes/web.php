<?php
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;  // <-- Agrega esto
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas web para tu aplicación.
|
*/

Route::get('/', function () {
    return redirect()->route('pacientes.index');
});

Route::resource('pacientes', PacienteController::class)->except(['show']);

// CRUD completo de Médicos
Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadController::class); // <-- AÑADIDO
