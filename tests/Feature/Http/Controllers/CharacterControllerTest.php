<?php

use App\Models\Character;
use App\Models\Chronicle;
use App\Models\User;
use Database\Seeders\CharacterSeeder;

test('The characters index page is rendered correctly', function () {

    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get('/characters');

    $response->assertStatus(200);
});

test('The user is redirect to the character demo page if he doesnt own a character', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->seed('CharacterSeeder');

    $response = $this->get('/');

    $response->assertRedirect(route('characters.show', Character::first()));
});
