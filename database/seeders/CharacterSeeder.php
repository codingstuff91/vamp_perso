<?php

namespace Database\Seeders;

use App\Models\BloodPotency;
use App\Models\Character;
use App\Models\Chronicle;
use App\Models\Clan;
use App\Models\Predation;
use App\Models\User;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    public function run(): void
    {
        Character::factory()
            ->for(Chronicle::factory()->create())
            ->for(Clan::first())
            ->for(BloodPotency::factory()->create())
            ->for(Predation::factory()->create())
            ->create([
                'user_id' => User::first()->id,
                'name' => 'Dracula Von Helsing',
            ]);
    }
}
