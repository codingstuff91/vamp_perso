<?php

use App\Services\ExperienceService;

test('Decrease experience points of a character', function () {
    $character = createCharacter(experiencePoints: 10);

    app(ExperienceService::class)->decreasePoints($character, 5);

    $character->refresh();

    expect($character->experience_points)->toBe(5);
});
