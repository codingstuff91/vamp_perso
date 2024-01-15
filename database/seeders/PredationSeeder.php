<?php

namespace Database\Seeders;

use App\Models\Predation;
use Illuminate\Database\Seeder;

class PredationSeeder extends Seeder
{
    public function run(): void
    {
        Predation::factory()->count(10)->create();
    }
}
