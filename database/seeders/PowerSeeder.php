<?php

namespace Database\Seeders;

use App\Models\Description;
use App\Models\Discipline;
use App\Models\Power;
use Illuminate\Database\Seeder;

class PowerSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Discipline::all() as $discipline) {
            for($level=1; $level < 6; $level++) {
                Power::factory()
                    ->has(Description::factory())
                    ->create([
                        'discipline_id' => $discipline->id,
                        'level' => $level,
                    ]);
            }
        }
    }
}
