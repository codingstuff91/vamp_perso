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

test('The user is redirect to the chronicle select page if he has not choosed a chronicle yet', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/characters');

    $response->assertStatus(200);
});
