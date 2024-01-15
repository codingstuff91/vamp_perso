<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Description>
 */
class DescriptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'text' => fake()->paragraph(),
        ];
    }
}
