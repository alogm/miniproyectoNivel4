<?php

namespace Database\Seeders;

use App\Models\alumnos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        alumnos::factory(20)->create();
    }
}
