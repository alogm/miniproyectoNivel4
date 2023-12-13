<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\alumnos;
use App\Models\asistencia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $alumnos = new AlumnosSeeder;
        $alumnos ->run();

        $asistencia = new MateriasSeeder;
        $asistencia->run();

        $curso = new CursosSeeder;
        $curso->run();

        $docente =new DocentesSeeder;
        $docente->run();

        $matri = new MatriculaSeeder;
        $matri->run();
    }
}
