<?php

use App\Models\Chronicle;
use App\Models\User;

it('Display the chronicles index page correctly', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/chronicles');

    $response->assertStatus(200);
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
