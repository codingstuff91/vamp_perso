<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         User::factory()->create([
             'name' => 'mattou',
             'email' => 'mattou2812@gmail.com',
         ]);

        $this->call([
            PredationSeeder::class,
            CompulsionSeeder::class,
            ClanSeeder::class,
            CharacterSeeder::class,
            AttributeSeeder::class,
            AttributeCharacterSeeder::class,
            DisciplineSeeder::class,
            PowerSeeder::class,
            CharacterPowerSeeder::class,
        ]);

    }
}
