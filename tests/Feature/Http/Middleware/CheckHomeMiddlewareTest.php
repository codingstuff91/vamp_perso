<?php

use App\Models\BloodPotency;
use App\Models\Character;
use App\Models\Chronicle;
use App\Models\Clan;
use App\Models\Predation;
use App\Models\User;

it('A game master without a chronicle is redirect to chronicle index page', function () {
    $gameMaster = User::factory()->gameMaster()->create();
    $this->actingAs($gameMaster);

    $response = $this->get('/');

    $response->assertRedirect(route('chronicle.index'));
});

it('A player without a character is redirect to the character demo page', function () {
    $user = User::factory()->player()->create();
    $anotherUser = User::factory()->player()->create();

    $this->actingAs($user);

    $character = Character::factory()
        ->for($anotherUser)
        ->for(BloodPotency::factory()->create())
        ->for(Chronicle::factory()->create())
        ->for(Clan::factory()->create())
        ->for(Predation::factory()->create())
        ->create([
            'name' => 'Dracula Von Helsing',
        ]);

    $response = $this->get(route('index'));

    $response->assertRedirect(route('characters.show', Character::first()->id));
});
