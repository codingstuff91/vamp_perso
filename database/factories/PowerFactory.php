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
            'level' => 1,
            'dice_pool' => "Wits + resolution",
        ];
    }
}
