<?php

use App\Models\Character;
use App\Models\Chronicle;
use App\Models\Clan;
use App\Models\Concept;
use App\Models\Predation;
use App\Models\User;
use Database\Seeders\ConceptCharacterSeeder;
use Database\Seeders\ConceptSeeder;

test('Get the list of concepts of a character', function () {
    $this->withoutExceptionHandling();

    $user = User::factory()->create();
    $this->actingAs($user);

    $character = Character::factory()
        ->for(User::factory()->create())
        ->for(Chronicle::factory()->create())
        ->for(Clan::factory()->create())
        ->for(Predation::factory())
        ->create();

    $this->seed(ConceptSeeder::class);
    $this->seed(ConceptCharacterSeeder::class);

    $response = $this->get("/character/{$character->id}/concepts");

    $response->assertStatus(200);
    expect($character->concepts)->not()->toBeEmpty();
});
