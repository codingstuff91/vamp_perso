<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Discipline;
use Inertia\Inertia;

class PowerImprovementController extends Controller
{
    public function index(Character $character)
    {
        return Inertia::render('Character/Discipline/Index', [
            'disciplines' => Discipline::all(),
            'characterPowers' => $character->powers()->get()->pluck('id'),
            'characterClan' => $character->clan,
        ]);
    }

    public function getPowers(Discipline $discipline)
    {
        return $discipline->powers()->orderBy('level', 'asc')->get();
    }
}
