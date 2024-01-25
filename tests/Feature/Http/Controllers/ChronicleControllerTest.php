<?php

use App\Models\Chronicle;
use App\Models\User;

it('Can render the chronicles index page correctly', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/chronicles');

    $response->assertStatus(200);
});

it('The current game master can see only his chronicles', function () {
    $gameMaster = User::factory()->gameMaster()->create();
    $anotherGameMaster = User::factory()->create();

    $this->actingAs($gameMaster);

    $chronicle = Chronicle::factory()
        ->create([
            'game_master_id' => $gameMaster->id,
        ]);

    $anotherChronicle = Chronicle::factory()
        ->create([
            'game_master_id' => $anotherGameMaster->id,
        ]);

    $response = $this->get('/chronicles');

    expect($gameMaster->chronicles->count())
        ->toBe(1)
        ->and($anotherGameMaster->chronicles->count())
        ->toBe(1);

    $response->assertStatus(200);
    $response->assertSee($chronicle->name);
    $response->assertDontSee($anotherChronicle->name);
});

it('can render the chronicle create page correctly', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->get('/chronicles/create')
        ->assertStatus(200);
});

it('can store a new chronicle', function () {
    $this->withoutExceptionHandling();

    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->post('/chronicles', [
        'name' => fake()->word(),
        'details' => fake()->paragraph(),
    ]);

    $response->assertRedirect('/chronicles');
    $this->assertDatabaseCount('chronicles', 1);
});

it('can select a chronicle', function () {
    $this->withoutExceptionHandling();

    $chronicle = Chronicle::factory()->create();

    $user = User::factory()->create();
    $this->actingAs($user);

    $this->post(route('chronicle.select', $user), [
        'chronicle_id' => $chronicle->id,
    ]);

    expect($user->refresh()->chronicle_id)->toBe($chronicle->id);
});
