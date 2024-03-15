<?php

namespace App\Actions\Compulsions;

use App\Models\Character;
use App\Models\Compulsion;

class SetCharacterCompulsionAction
{
    public function execute(Compulsion $compulsion, Character $character): void
    {
        $character->compulsion_id = $compulsion->id;
        $character->save();
    }
}
