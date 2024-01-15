<?php

use App\Models\User;

it('Display the chronicles index page correctly', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/chronicles');

    $response->assertStatus(200);
});
