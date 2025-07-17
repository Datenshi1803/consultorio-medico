<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'correo' => 'admin@correo.com',
            'contrasena' => bcrypt('admin123'),
            'rol' => 'administrador',
        ]);

        Usuario::create([
            'correo' => 'medico1@correo.com',
            'contrasena' => bcrypt('medico123'),
            'rol' => 'medico',
        ]);

        Usuario::create([
            'correo' => 'paciente1@correo.com',
            'contrasena' => bcrypt('paciente123'),
            'rol' => 'paciente',
        ]);
    }
}

