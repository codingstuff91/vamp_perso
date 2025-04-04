<?php

namespace App\Services;

use App\Actions\Experience\GetExperienceMultiplier;
use App\Models\Attribute;

class CharacterImprovementService
{
    public function __construct(public GetExperienceMultiplier $getExperienceMultiplier)
    {
    }

    public function getRequiredExperiencePoints(int $targetedAttributeLevel, Attribute $attribute): int
    {
        $multiplier = $this->getExperienceMultiplier->execute($attribute);

        return $targetedAttributeLevel * $multiplier;
    }
}
