<?php

namespace App\Http\Controllers;

use App\Actions\Compulsions\GetRandomCompulsionAction;
use App\Actions\Compulsions\SetCharacterCompulsionAction;
use App\Models\Character;

class CompulsionController extends Controller
{
    public function associate(Character $character): void
    {
        $randomCompulsion = app(GetRandomCompulsionAction::class)->execute($character);

        app(SetCharacterCompulsionAction::class)->execute($randomCompulsion, $character);
    }
}
