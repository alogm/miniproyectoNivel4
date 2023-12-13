<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\alumnos>
 */
class AlumnosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->name(),
            'apellido'=>fake()->lastName(),
            'dni'=>fake()->numberBetween(),
            'correo'=>fake()->email(),
            'direccion'=>fake()->address(),
            'fecha_nacimiento'=>fake()->date()
        ];
    }
}
