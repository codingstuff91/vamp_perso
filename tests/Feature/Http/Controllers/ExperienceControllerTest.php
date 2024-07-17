<?php

use App\Models\Character;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\put;

it('The experience index page is rendered correctly', function () {
    $this->seed();

    $this->actingAs(User::first());

    $response = $this->get('/experience');

    $response->assertStatus(200);
});

it('Updates the experience points of a character', function () {
    $this->seed();

    $this->actingAs(User::first());

    put(route('experience.update', Character::first()), [
        'experiencePoints' => 1,
    ]);

    expect(Character::first()->experience_points)->toBe(2);
});

it('Hides the experience menu for user with player role', function () {
    $playerRole = User::factory()->player()->create();

    actingAs($playerRole);

    $response = get(route('characters.index'));

    $response->assertDontSee('Experience');
});
