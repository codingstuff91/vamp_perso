<?php

namespace Database\Factories;

use App\Models\Predation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
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
            'experience_points' => 0,
            'experience_total' => 0,
            'sire' => fake()->name(),
            'appearance' => fake()->paragraph(3),
            'apparent_age' => 30,
            'true_age' => 25,
            'embrace_year' => 1981,
            'ambition' => fake()->sentence(5),
            'conviction' => fake()->sentence(5),
            'desire' => fake()->sentence(5),
            'background' => fake()->paragraph(3),
        ];
    }
}
