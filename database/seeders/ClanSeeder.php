<?php

namespace Database\Seeders;

use App\Models\Clan;
use Illuminate\Database\Seeder;

class ClanSeeder extends Seeder
{
    public function run(): void
    {
        Clan::factory()->count(7)->create();
    }
}
