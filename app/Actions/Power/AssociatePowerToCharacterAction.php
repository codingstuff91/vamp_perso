<?php

namespace App\Actions\Power;

use App\Exceptions\NotEnoughExperiencePoints;
use App\Models\Character;
use App\Models\Power;
use App\Services\ExperienceService;

class AssociatePowerToCharacterAction
{
    public function __construct(
        public ExperienceService $experienceService,
    ) {
    }

    /**
     * @throws NotEnoughExperiencePoints
     */
    public function execute(
        Character $character,
        Power $power,
        int $requiredExperiencePoints,
    ): void {
        $this->experienceService->hasEnoughExperiencePoints($character, $requiredExperiencePoints);

        $this->experienceService->decreasePoints($character, $requiredExperiencePoints);

        $character->powers()->attach($power);
    }
}
