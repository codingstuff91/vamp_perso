<?php

namespace Database\Seeders;

use App\Models\Clan;
use App\Models\Compulsion;
use Illuminate\Database\Seeder;

class CompulsionSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * Create a compulsion for each clan
         */
        foreach (Clan::all() as $clan) {
            Compulsion::factory()
                ->for($clan)
                ->create();
        }

        Compulsion::factory()->count(4)->create();
    }
}
