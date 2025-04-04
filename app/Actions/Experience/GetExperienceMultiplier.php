<?php

namespace App\Actions\Experience;

use App\Models\Attribute;

class GetExperienceMultiplier
{
    public const ATTRIBUTE_MULTIPLIER = 4;

    public const SKILL_MULTIPLIER = 3;

    public function execute(Attribute $attribute): string
    {
        if (str_contains($attribute->category, 'attribute')) {
            return self::ATTRIBUTE_MULTIPLIER;
        }

        return self::SKILL_MULTIPLIER;
    }
}
