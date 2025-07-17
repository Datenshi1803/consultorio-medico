<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

public function run()
{
    $especialidades = ['Pediatría', 'Dermatología', 'Cardiología', 'Ginecología', 'Neurología'];

    foreach ($especialidades as $esp) {
        Especialidad::create([
            'descripcion' => $esp,
            'cant_medicos' => 0, 
        ]);
    }
}

}
