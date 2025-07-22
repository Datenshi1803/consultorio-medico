<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
{
    $this->call([
        UserSeeder::class,         // Primero usuarios (tabla users)
        EspecialidadSeeder::class, // Luego especialidades
        MedicoSeeder::class,       // Luego médicos (referencia a users)
        PacienteSeeder::class,
        HorarioSeeder::class,
        CitaSeeder::class,
        NotificacionSeeder::class,
    ]);
}

}
