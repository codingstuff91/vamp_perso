<?php

use App\Models\Character;
use App\Models\User;
use Database\Seeders\CharacterSeeder;
use Database\Seeders\ClanSeeder;
use Database\Seeders\CompulsionSeeder;

test('renders the whole compulsions list including the character\'s clan specific compulsion', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->seed([
        ClanSeeder::class,
        CompulsionSeeder::class,
        CharacterSeeder::class,
    ]);

    $character = Character::first();

    $compulsions = app(App\Actions\Compulsions\GetCompulsionsListAction::class)->execute($character);

    /** Whe should receive 4 generic compulsions + 1 clan's specific compulsion */
    expect($compulsions->count())->toBe(5);
});
