<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ChronicleSeeder::class,
            PredationSeeder::class,
            ClanSeeder::class,
            CompulsionSeeder::class,
            BackgroundTypeSeeder::class,
            BackgroundSeeder::class,
            CharacterSeeder::class,
            ConceptSeeder::class,
            AttributeSeeder::class,
            AttributeCharacterSeeder::class,
            ConceptCharacterSeeder::class,
            BackgroundCharacterSeeder::class,
            DisciplineSeeder::class,
            PowerSeeder::class,
            CharacterPowerSeeder::class,
        ]);

    }
}
