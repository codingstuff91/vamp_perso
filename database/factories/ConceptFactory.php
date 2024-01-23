<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Concept>
 */
class ConceptFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word,
        ];
    }
}
