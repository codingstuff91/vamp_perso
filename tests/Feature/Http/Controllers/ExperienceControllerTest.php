<?php

use App\Models\Character;
use App\Models\User;

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
