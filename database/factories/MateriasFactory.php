<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\materias>
 */
class MateriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $materias = ['ingles', 'español', 'filosofia', 'quimica', 'algebra', 'programacion'];
        $materia = rand(0, 5);
        return [
            'materia'=>$materias[$materia],
        ];
    }
}
