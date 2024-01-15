<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Description;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    private $categories = [
        'physical_attributes' => 3,
        'social_attributes' => 3,
        'mental_attributes' => 3,
        'physical_skills' => 9,
        'social_skills' => 9,
        'mental_skills' => 9,
        'health' => 3,
        'willpower' => 2,
        'hunger' => 1,
        'humanity' => 2,
    ];

    public function run(): void
    {
        foreach ($this->categories as $category => $count) {
            Attribute::factory()
                ->count($count)
                ->has(Description::factory())
                ->create([
                    'category' => $category,
            ]);
        }
    }
}
