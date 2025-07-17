<?php

namespace Database\Seeders;

use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


public function run()
{
    $especialidad = Especialidad::first(); // Asigna la primera especialidad

    Medico::create([
        'nombre' => 'Carlos',
        'apellido' => 'Ramírez',
        'fechanacimiento' => '1980-04-10',
        'tipo_sangre' => 'O+',
        'especialidad_id' => $especialidad->id,
    ]);
}

}
