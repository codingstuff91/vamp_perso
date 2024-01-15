<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\CharacterPower;
use App\Models\Power;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterPowerSeeder extends Seeder
{
    public function run(): void
    {
        CharacterPower::create([
            'character_id' => Character::first()->id,
            'power_id' => Power::first()->id,
        ]);
    }
}
