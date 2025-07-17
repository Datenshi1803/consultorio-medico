<?php

namespace Database\Seeders;

use App\Models\Horario;
use App\Models\Medico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

public function run()
{
    $medico = Medico::first();

    Horario::create([
        'medico_id' => $medico->id,
        'dia_semana' => 'Lunes',
        'hora_entrada' => '08:00:00',
        'hora_salida' => '16:00:00',
        'inicio_almuerzo' => '12:00:00',
        'fin_almuerzo' => '13:00:00',
    ]);
}

}
