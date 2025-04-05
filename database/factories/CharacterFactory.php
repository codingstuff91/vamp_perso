<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'generation' => 12,
            'experience_points' => 10,
            'experience_total' => 10,
            'sire' => fake()->name(),
            'appearance' => fake()->paragraph(3),
            'apparent_age' => 30,
            'true_age' => 25,
            'embrace_year' => 1981,
            'background' => fake()->paragraph(3),
        ];
    }
}
