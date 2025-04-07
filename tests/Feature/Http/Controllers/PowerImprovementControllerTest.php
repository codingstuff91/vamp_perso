<?php

test('The index page is rendered', function () {
    $user = createUser();
    $this->actingAs($user);

    $character = createCharacter($user);

    $response = $this->get(route('power_improve.index', [
        'character' => $character->id,
    ]));

    $response->assertStatus(200);
});
