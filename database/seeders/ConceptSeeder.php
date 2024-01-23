<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Concept;
use App\Models\Description;
use Illuminate\Database\Seeder;

class ConceptSeeder extends Seeder
{
    public function run(): void
    {
        $names = ['sire', 'ambition', 'conviction', 'desire'];

        foreach($names as $name) {
            Concept::factory()
            ->has(Description::factory())
            ->create([
                'name' => $name
            ]);
        }
    }
}
