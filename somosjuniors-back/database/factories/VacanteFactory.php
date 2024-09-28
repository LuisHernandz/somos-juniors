<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacante>
 */
class VacanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'puesto' =>$this->faker->sentence(2),
            'descripcion' =>$this->faker->text(100),
            'foto' =>$this->faker->name(),
            'vacD' => rand(11, 50),
            'vaco' => rand(1, 10),
        ];
    }
}
