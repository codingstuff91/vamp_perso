<?php

namespace App\Services;

use App\Models\Character;

class ExperienceService
{
    public function decreasePoints(Character $character, int $consumedExperiencePoints): void
    {
        $character->experience_points -= $consumedExperiencePoints;

        $character->save();
    }
}
