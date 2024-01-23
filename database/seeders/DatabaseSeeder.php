<?php

namespace Database\Seeders;

use App\Models\Chronicle;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         User::factory()
             ->for(Chronicle::factory()->create())
             ->create([
             'name' => 'mattou',
             'email' => 'mattou2812@gmail.com',
         ]);

        $this->call([
            PredationSeeder::class,
            CompulsionSeeder::class,
            ClanSeeder::class,
            CharacterSeeder::class,
            ConceptSeeder::class,
            AttributeSeeder::class,
            AttributeCharacterSeeder::class,
            ConceptCharacterSeeder::class,
            DisciplineSeeder::class,
            PowerSeeder::class,
            CharacterPowerSeeder::class,
        ]);

    }
}
