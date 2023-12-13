<?php

namespace Database\Seeders;

use App\Models\docentes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        docentes::factory(6)->create();
    }
}
