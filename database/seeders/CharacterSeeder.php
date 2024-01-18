<?php

namespace Database\Seeders;

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
            ->for(User::factory()->create())
            ->for(Chronicle::factory()->create())
            ->for(Clan::factory()->create())
            ->for(Predation::factory()->create())
            ->create();
    }
}