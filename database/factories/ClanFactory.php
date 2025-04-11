<?php

namespace Database\Factories;

use App\Models\Clan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Clan>
 */
class ClanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(3),
            'disciplines' => [
                'available' => [
                    'Animalisme',
                    'Auspex',
                ],
            ],
            'bane' => fake()->word(),
            'compulsion' => fake()->word(),
        ];
    }
}
