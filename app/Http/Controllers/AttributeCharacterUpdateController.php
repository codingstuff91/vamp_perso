<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeCharacter;
use App\Models\Character;
use Illuminate\Http\Request;

class AttributeCharacterUpdateController extends Controller
{
    public function __invoke(Request $request, Character $character, Attribute $attribute)
    {
        AttributeCharacter::where('character_id', $character->id)
            ->where('attribute_id', $attribute->id)
            ->update([ 'attribute_value' => $request->newScore ]);
    }
}
