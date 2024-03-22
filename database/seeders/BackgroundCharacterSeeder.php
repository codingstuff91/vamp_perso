<?php

namespace Database\Seeders;

use App\Models\background;
use App\Models\BackgroundCharacter;
use App\Models\Character;
use Illuminate\Database\Seeder;

class BackgroundCharacterSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Background::all() as $background) {
            BackgroundCharacter::create([
                'character_id' => Character::first()->id,
                'background_id' => $background->id,
            ]);
        }
    }
}
