<?php

use App\Models\Character;
use App\Models\Chronicle;
use App\Models\User;
use Database\Seeders\CharacterSeeder;

it('The characters index page is rendered correctly', function () {
    $user = createUser();
    $this->actingAs($user);

    $response = $this->get('/characters');

    $response->assertStatus(200);
});

it('Shows a character correctly', function () {
    $user = createUser();
    $this->actingAs($user);

    $character = createCharacter($user);

    $response = $this->get(route('characters.show', $character));

    $response->assertStatus(200);
});
