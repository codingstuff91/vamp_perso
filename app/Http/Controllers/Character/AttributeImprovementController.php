<?php

namespace App\Http\Controllers\Character;

use App\Actions\Attribute\ImproveCharacterAttributeAction;
use App\Actions\Attribute\ImproveCharacterAttributeActionInput;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeCharacter;
use App\Models\Character;
use App\Services\CharacterImprovementService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttributeImprovementController extends Controller
{
    public function __construct(
        public CharacterImprovementService $attributeService,
        public ImproveCharacterAttributeAction $improveCharacterAttributeAction,
    ) {
    }

    public function index(Character $character, Attribute $attribute)
    {
        $attributeValue = AttributeCharacter::where('character_id', $character->id)
            ->where('attribute_id', $attribute->id)
            ->first()
            ->attribute_value;

        $requiredExperiencePoints = $this->attributeService->getRequiredExperiencePoints($attributeValue + 1, $attribute);

        abort_if($requiredExperiencePoints > $character->experience_points, 403, __('Pas assez de points pour améliorer cet attribut.'));

        return Inertia::render('Character/AttributeImprovement', [
            'character' => $character,
            'attribute' => $attribute,
            'attribute_value' => $attributeValue,
            'required_experience_points' => $requiredExperiencePoints,
        ]);
    }

    public function update(Character $character, Attribute $attribute, Request $request)
    {
        $input = ImproveCharacterAttributeActionInput::fromController($character, $attribute, $request);

        $this->improveCharacterAttributeAction->execute($input);
    }
}
