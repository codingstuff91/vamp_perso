<?php

namespace Database\Seeders;

use App\Models\Compulsion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompulsionSeeder extends Seeder
{
    public function run(): void
    {
        Compulsion::factory()->count(3)->create();
    }
}
