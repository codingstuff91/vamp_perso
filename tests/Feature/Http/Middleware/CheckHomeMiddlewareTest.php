<?php

use App\Models\BloodPotency;
use App\Models\Character;
use App\Models\Chronicle;
use App\Models\Clan;
use App\Models\Predation;
use App\Models\User;

it('Redirects a game master who doesnt own a chronicle to the chronicle index page', function () {
    $gameMaster = User::factory()->gameMaster()->create();
    $this->actingAs($gameMaster);

    $response = $this->get('/');

    $response->assertRedirect(route('chronicle.index'));
});

it('Redirects a player who doesnt own a character to the character index page', function () {
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

    $response = $this->get(route('home'));

    $response->assertRedirect(route('characters.index'));
});

it('Redirects a player who owns a character to his character show page', function () {
    $user = User::factory()->player()->create();
    $this->actingAs($user);

    $character = Character::factory()
        ->for($user)
        ->for(BloodPotency::factory()->create())
        ->for(Chronicle::factory()->create())
        ->for(Clan::factory()->create())
        ->for(Predation::factory()->create())
        ->create([
            'name' => 'Dracula Von Helsing',
        ]);

    $response = $this->get(route('index'));

    $response->assertRedirect(route('characters.show', $character));
});
