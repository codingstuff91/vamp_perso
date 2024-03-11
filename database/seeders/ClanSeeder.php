<?php

namespace Database\Seeders;

use App\Models\Clan;
use Illuminate\Database\Seeder;

class ClanSeeder extends Seeder
{
    private const CLANS = [
        'Brujah',
        'Gangrel',
        'Toréador',
        'Nosferatu',
        'Tremere',
        'Ventrue',
    ];

    public function run(): void
    {
        foreach (self::CLANS as $clan) {
            Clan::factory()->create([
                'name' => $clan,
            ]);
        }
    }
}
