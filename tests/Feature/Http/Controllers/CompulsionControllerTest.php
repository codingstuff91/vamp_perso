<?php

use App\Models\Character;
use App\Models\User;
use Database\Seeders\CharacterSeeder;
use Database\Seeders\ClanSeeder;
use Database\Seeders\CompulsionSeeder;

test('it renders the compulsions list', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->seed([
        ClanSeeder::class,
        CompulsionSeeder::class,
        CharacterSeeder::class,
    ]);

    $character = Character::first();
    $response = $this->get(route('compulsions.index', $character));

    $response->assertOk();
});
