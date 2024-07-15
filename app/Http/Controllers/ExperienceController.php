<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Chronicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ExperienceController extends Controller
{
    public function index()
    {
        $currentChronicle = Chronicle::find(Auth::user()->chronicle_id);

        $chronicleCharacters = $currentChronicle->characters;

        return Inertia::render('Character/Experience', [
            'characters' => $chronicleCharacters,
        ]);
    }

    public function update(Character $character, Request $request)
    {
        $newExperiencePointsScore = $character->experience_points + $request->experiencePoints;

        $character->update([
            'experience_points' => $newExperiencePointsScore,
        ]);
    }
}
