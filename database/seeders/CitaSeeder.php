<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

public function run()
{
    $paciente = Paciente::first();
    $medico = Medico::first();

    Cita::create([
        'paciente_id' => $paciente->id,
        'medico_id' => $medico->id,
        'fecha' => now()->addDays(3)->format('Y-m-d'),
        'hora' => '09:30:00',
        'motivo' => 'Consulta general',
        'estado' => 'pendiente',
    ]);
}

}
