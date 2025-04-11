<?php

namespace App\Services;

use App\Exceptions\NotEnoughExperiencePoints;
use App\Models\Character;

class ExperienceService
{
    public function decreasePoints(Character $character, int $consumedExperiencePoints): void
    {
        $character->experience_points -= $consumedExperiencePoints;

        $character->save();
    }

    public function hasEnoughExperiencePoints(Character $character, int $requiredExperiencePoints): bool
    {
        if ($character->experience_points < $requiredExperiencePoints) {
            throw new NotEnoughExperiencePoints('Pas assez de points d\'experience');
        }

        return true;
    }
}
