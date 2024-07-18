<?php

namespace Database\Seeders;

use App\Models\Chronicle;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChronicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chronicle::factory()
            ->for(User::first(), 'user')
            ->create();
    }
}
