<?php

use App\Models\Character;
use App\Models\Compulsion;
use App\Models\User;
use Database\Seeders\CharacterSeeder;
use Database\Seeders\ClanSeeder;
use Database\Seeders\CompulsionSeeder;

test('Deletes the compulsion of a character', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->seed([
        ClanSeeder::class,
        CompulsionSeeder::class,
        CharacterSeeder::class,
    ]);

    $character = Character::first();
    $character->compulsion_id = Compulsion::first()->id;

    $response = $this->delete(route('compulsions.destroy', $character));

    $character->refresh();

    $response->assertOk();

    expect($character->compulsion_id)->toBeNull();
});
