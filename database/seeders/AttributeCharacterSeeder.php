<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeCharacter;
use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeCharacterSeeder extends Seeder
{
    private $categories = [
        'physical_attributes' => [0, 5],
        'social_attributes'  => [0, 5],
        'mental_attributes'  => [0, 5],
        'physical_skills'  => [0, 5],
        'social_skills'  => [0, 5],
        'mental_skills'  => [0, 5],
        'health' => [3, 6],
        'willpower' => [3,6],
        'hunger' => [0,5],
        'humanity' => [0,10],
    ];

    public function run(): void
    {
        foreach ($this->categories as $category => $minMaxValues) {
            $attributeCategoryIds = Attribute::where('category', $category)->pluck('id');

            $attributeCategoryIds->each(function (int $attributeId) use ($minMaxValues) {
                AttributeCharacter::create([
                    'character_id' => Character::first()->id,
                    'attribute_id' => $attributeId,
                    'attribute_value' => fake()->numberBetween($minMaxValues[0], $minMaxValues[1]),
                ]);
            });
        }
    }
}
