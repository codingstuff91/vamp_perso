<?php

use App\Models\User;

test('it renders the compulsions list', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/compulsions');

    $response->assertOk();
});
