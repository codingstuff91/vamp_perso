<?php

use App\Models\Character;
use App\Models\Chronicle;
use App\Models\User;
use Database\Seeders\CharacterSeeder;

it('The characters index page is rendered correctly', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/characters');

    $response->assertStatus(200);
});

it('Shows a character correctly', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

});
