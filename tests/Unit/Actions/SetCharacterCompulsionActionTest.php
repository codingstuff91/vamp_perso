<?php

use App\Actions\Compulsions\SetCharacterCompulsionAction;
use App\Models\Character;
use App\Models\Compulsion;
use App\Models\User;
use Database\Seeders\CharacterSeeder;
use Database\Seeders\ClanSeeder;
use Database\Seeders\CompulsionSeeder;

test('give a compulsion to a character', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->seed([
        ClanSeeder::class,
        CompulsionSeeder::class,
        CharacterSeeder::class,
    ]);

    $character = Character::first();
    $compulsion = Compulsion::first();

    expect($character->compulsion_id)->toBeNull();

    $compulsion = app(SetCharacterCompulsionAction::class)->execute($compulsion, $character);

    expect($character->compulsion_id)->toBeInt();
    expect($character->compulsion_id)->not()->toBeNull();
});
