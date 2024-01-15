<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Power>
 */
class PowerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'cost' => fake()->word(),
            'dice_pool' => "Wits + resolution",
            'system' => fake()->paragraph(2),
            'duration' => fake()->paragraph(2),
        ];
    }
}
