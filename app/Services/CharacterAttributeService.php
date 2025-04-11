<?php

namespace App\Services;

use App\Actions\Attribute\ImproveCharacterAttributeActionInput;
use App\Models\AttributeCharacter;

class CharacterAttributeService
{
    public function update(ImproveCharacterAttributeActionInput $input)
    {
        AttributeCharacter::where('character_id', $input->character->id)
            ->where('attribute_id', $input->attribute->id)
            ->update(['attribute_value' => $input->newScore]);
    }
}
