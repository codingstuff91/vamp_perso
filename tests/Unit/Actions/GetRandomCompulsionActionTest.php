<?php

use App\Actions\Compulsions\GetRandomCompulsionAction;
use App\Models\Character;
use App\Models\Compulsion;
use App\Models\User;
use Database\Seeders\CharacterSeeder;
use Database\Seeders\ClanSeeder;
use Database\Seeders\CompulsionSeeder;

test('get a random compulsion from a list including the character\'s clan compulsion', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->seed([
        ClanSeeder::class,
        CompulsionSeeder::class,
        CharacterSeeder::class,
    ]);

    $character = Character::first();

    $compulsion = app(GetRandomCompulsionAction::class)->execute($character);

    expect($compulsion)->toBeInstanceOf(Compulsion::class);
});
