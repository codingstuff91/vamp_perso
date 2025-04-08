<?php

namespace App\Http\Controllers;

use App\Actions\Power\AssociatePowerToCharacterAction;
use App\Models\Character;
use App\Models\Discipline;
use App\Models\Power;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PowerImprovementController extends Controller
{
    public function __construct(public AssociatePowerToCharacterAction $associatePowerToCharacterAction)
    {
    }

    public function index(Character $character)
    {
        return Inertia::render('Character/Discipline/Index', [
            'disciplines' => Discipline::all(),
            'characterPowers' => $character->powers()->get()->pluck('id'),
            'character' => $character,
            'characterClan' => $character->clan,
        ]);
    }

    public function getPowers(Discipline $discipline)
    {
        return $discipline->powers()->orderBy('level', 'asc')->get();
    }

    public function store(
        Character $character,
        Power $power,
        Request $request
    ) {
        $this->associatePowerToCharacterAction->execute($character, $power, $request->requiredExperiencePoints);
    }
}
