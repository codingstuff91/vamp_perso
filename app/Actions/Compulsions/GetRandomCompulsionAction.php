<?php

namespace App\Actions\Compulsions;

use App\Models\Character;
use App\Models\Compulsion;

class GetRandomCompulsionAction
{
    public function execute(Character $character)
    {
        $clan = $character->clan;

        $compulsions = Compulsion::where('clan_id', $clan->id)
            ->orWhere('clan_id', null)
            ->get();

        return $compulsions->random();
    }
}
