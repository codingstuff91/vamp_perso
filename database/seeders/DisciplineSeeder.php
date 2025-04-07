<?php

namespace Database\Seeders;

use App\Enums\DisciplineEnum;
use App\Models\Description;
use App\Models\Discipline;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    public function run(): void
    {
        foreach (DisciplineEnum::cases() as $discipline) {
            Discipline::factory()
                ->has(Description::factory())
                ->create([
                    'name' => $discipline->name,
                    'description' => $discipline->description(),
                ]);
        }
    }
}
