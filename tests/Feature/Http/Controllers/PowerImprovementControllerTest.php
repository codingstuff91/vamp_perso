<?php

use App\Models\Power;

test('The index page is rendered', function () {
    $user = createUser();
    $this->actingAs($user);

    $character = createCharacter($user);

    $response = $this->get(route('power_improve.index', [
        'character' => $character->id,
    ]));

    $response->assertStatus(200);
});

test('Decrease experience points from a character when associate new power', function () {
    $user = createUser();
    $this->actingAs($user);

    $character = createCharacter($user, experiencePoints: 10);

    $power = createPower();

    $this->post(route('power_improve.store', [
        'character' => $character->id,
        'power' => $power->id,
    ]), [
        'requiredExperiencePoints' => 5,
    ]);

    $character->refresh();

    expect($character->experience_points)->toBe(5);
});

test('Associate a new power', function () {
    $user = createUser();
    $this->actingAs($user);

    $character = createCharacter($user, experiencePoints: 10);

    expect($character->powers)->toBeEmpty();

    $power = createPower();

    $this->post(route('power_improve.store', [
        'character' => $character->id,
        'power' => $power->id,
    ]), [
        'requiredExperiencePoints' => 5,
    ]);

    $character->refresh();

    expect($character->powers->first())
        ->toBeInstanceOf(Power::class)
        ->and($character->powers->first()->id)
        ->toBe($power->id);

});
