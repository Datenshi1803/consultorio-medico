<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


public function run()
{
    $usuario = User::where('rol', 'paciente')->first();

    Paciente::create([
        'nombre1' => 'Juan',
        'nombre2' => 'Carlos',
        'apellido1' => 'Pérez',
        'apellido2' => 'López',
        'fechadenacimiento' => '2000-05-20',
        'tipo_sangre' => 'A+',
        'padecimientos_anteriores' => 'Asma',
        'predisposiciones' => 'Diabetes',
        'genero' => 'Masculino',
        'telefono_principal' => '67891234',
        'telefono_emergencia' => '67890000',
        'correo' => 'paciente1@correo.com',
        'direccion' => 'Ciudad Hospital, Calle 10',
        'alergias' => 'Penicilina',
        'medicamentos' => 'Salbutamol',
        'historial_cirugias' => 'Apendicectomía',
        'user_id' => $usuario->id,
    ]);
}

}
