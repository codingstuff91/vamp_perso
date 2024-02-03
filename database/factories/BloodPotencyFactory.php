<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BloodPotency>
 */
class BloodPotencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level' => 1,
            'blood_rise' => fake()->sentence(5),
            'power_bonus' => fake()->sentence(5),
            'feeding_penalty' => fake()->sentence(5),
            'damage_healed_per_turn' => fake()->sentence(5),
            'hunger_test' => fake()->sentence(5),
            'bane_score' => fake()->sentence(5),
        ];
    }
}
