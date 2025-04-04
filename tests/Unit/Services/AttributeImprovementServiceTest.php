<?php

use App\Models\Attribute;
use App\Services\CharacterImprovementService;

test('computes the required amount of experience points to improve an attribute', function () {
    $attribute = Attribute::factory()->create([
        'category' => 'physical_attribute',
    ]);

    $targetedAttributeLevel = 2;

    $requiredExperiencePoints = app(CharacterImprovementService::class)->getRequiredExperiencePoints($targetedAttributeLevel, $attribute);

    expect($requiredExperiencePoints)->toBe(8);
});

test('computes the required amount of experience points to improve a skill', function () {
    $attribute = Attribute::factory()->create([
        'category' => 'physical_skills',
    ]);

    $targetedAttributeLevel = 2;

    $requiredExperiencePoints = app(CharacterImprovementService::class)->getRequiredExperiencePoints($targetedAttributeLevel, $attribute);

    expect($requiredExperiencePoints)->toBe(6);
});
