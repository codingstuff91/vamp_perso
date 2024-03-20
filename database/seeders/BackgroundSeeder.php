<?php

namespace Database\Seeders;

use App\Models\Background;
use App\Models\BackgroundType;
use Illuminate\Database\Seeder;

class BackgroundSeeder extends Seeder
{
    public function run(): void
    {
        Background::factory()
            ->count(2)
            ->create([
                'background_type_id' => BackgroundType::first()->id,
            ]);

        Background::factory()
            ->count(2)
            ->handicap()
            ->create([
                'background_type_id' => BackgroundType::first()->id,
            ]);
    }
}
