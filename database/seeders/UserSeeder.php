<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@correo.com',
            'password' => bcrypt('admin123'),
            'rol' => 'administrador',
        ]);

        User::create([
            'email' => 'medico1@correo.com',
            'password' => bcrypt('medico123'),
            'rol' => 'medico',
        ]);

        User::create([
            'email' => 'paciente1@correo.com',
            'password' => bcrypt('paciente123'),
            'rol' => 'paciente',
        ]);
    }
}