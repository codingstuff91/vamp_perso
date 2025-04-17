<?php

use App\Actions\Experience\GetExperienceMultiplier;
use App\Models\Attribute;

test('returns the Attribute experience multiplier', function () {
    $attribute = Attribute::factory()->create([
        'category' => 'physical_attribute',
    ]);

    $multiplier = (int) app(GetExperienceMultiplier::class)->execute($attribute);

    expect($multiplier)->toBe(GetExperienceMultiplier::ATTRIBUTE_MULTIPLIER);
});

test('returns the Skill experience multiplier', function () {
    $attribute = Attribute::factory()->create([
        'category' => 'physical_skills',
    ]);

    $multiplier = (int) app(GetExperienceMultiplier::class)->execute($attribute);

    expect($multiplier)->toBe(GetExperienceMultiplier::SKILL_MULTIPLIER);
});
