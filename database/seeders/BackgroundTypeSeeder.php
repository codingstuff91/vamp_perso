<?php

namespace Database\Seeders;

use App\Models\BackgroundType;
use Illuminate\Database\Seeder;

class BackgroundTypeSeeder extends Seeder
{
    private const TYPES = [
        'Influence',
        'Masque',
        'Mentor',
        'Refuge',
        'Renommée',
        'servants',
        'Statut',
        'Troupeau',
    ];

    public function run(): void
    {
        foreach (self::TYPES as $type) {
            BackgroundType::create([
                'name' => $type,
            ]);
        }
    }
}
