<?php

namespace App\Actions\Attribute;

use App\Services\CharacterAttributeService;
use App\Services\ExperienceService;

class ImproveCharacterAttributeAction
{
    public function __construct(
        public ExperienceService $experienceService,
        public CharacterAttributeService $characterAttributeService,
    ) {
    }

    public function execute(
        ImproveCharacterAttributeActionInput $input,
    ): void {
        $this->experienceService->decreasePoints($input->character, $input->consumedExperiencePoints);

        $this->characterAttributeService->update($input);
    }
}
