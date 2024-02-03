<?php

namespace Database\Seeders;

use App\Models\BloodPotency;
use Illuminate\Database\Seeder;

class BloodPotencySeeder extends Seeder
{
    public function run(): void
    {
        BloodPotency::factory()->create();
    }
}
