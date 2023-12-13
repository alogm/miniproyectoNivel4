<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\matricula>
 */
class MatriculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $asistencias = ['A', 'T', 'F'];
        $asitencia = rand(0, 2);
        $alumnos = rand(1, 20);
        $curso = rand(1,5);
        return [
            'asistencia'=>$asistencias[$asitencia],
            'fecha'=>fake()->date(),
            'alumno_id' =>$alumnos,
            'curso_id' =>$curso

        ];
    }
}
