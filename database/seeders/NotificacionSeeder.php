<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notificacion;
use App\Models\Paciente;
use App\Models\Medico;

class NotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 
public function run()
{
    Notificacion::create([
        'fecha_notificacion' => now(),
        'tipo' => 'paciente',
        'paciente_id' => Paciente::first()->id,
        'medico_id' => Medico::first()->id,
        'mensaje' => 'Tienes una cita programada esta semana',
        'leido' => false,
    ]);
}
}
