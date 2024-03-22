<?php

use App\Models\Character;

test('gets the backgrounds of a character', function () {
    $user = createUser();
    $this->actingAs($user);

    $this->seed();

    $response = $this->get(route('backgrounds.index', Character::first()));

    $response->assertOk(200);
});
