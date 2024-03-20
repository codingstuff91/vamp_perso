<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BackgroundFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'category' => 'advantage',
            'level' => 1,
        ];
    }

    public function handicap()
    {
        return $this->state(function (array $attributes) {
            return [
                'category' => 'handicap',
            ];
        });
    }
}
