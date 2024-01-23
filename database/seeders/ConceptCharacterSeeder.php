<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Concept;
use App\Models\ConceptCharacter;
use Illuminate\Database\Seeder;

class ConceptCharacterSeeder extends Seeder
{
    public function run(): void
    {
        foreach(Concept::all() as $concept) {
            ConceptCharacter::create([
                'character_id' => Character::first()->id,
                'concept_id' => $concept->id,
                'concept_value' => fake()->sentence(3)
            ]);
        }
    }
}
