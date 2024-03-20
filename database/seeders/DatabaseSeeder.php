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
            ->has(Chronicle::factory(), 'chronicles')
            ->create([
                'name' => 'test',
                'email' => 'test@test.com',
            ]);

        $this->call([
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
            DisciplineSeeder::class,
            PowerSeeder::class,
            CharacterPowerSeeder::class,
            BackgroundTypeSeeder::class,
        ]);

    }
}
