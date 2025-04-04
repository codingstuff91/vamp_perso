<?php

namespace App\Http\Controllers\Character;

use App\Models\Attribute;
use App\Models\Character;
use Illuminate\Http\Request;

class ImproveCharacterAttributeActionInput
{
    public function __construct(
        public Character $character,
        public Attribute $attribute,
        public int $newScore,
        public int $consumedExperiencePoints
    ) {
    }

    public static function fromController(Character $character, Attribute $attribute, Request $request): self
    {
        return new self($character, $attribute, $request->newScore, $request->consumedExperiencePoints);
    }
}
