<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Chronicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CharacterController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'player') {
            $characters = Auth::user()->characters;
            $characters->load('clan');

            return Inertia::render('Character/Index', [
                'characters' => $characters,
            ]);
        }

        $selectedChronicle = Chronicle::find(Auth::user()->chronicle_id);

        if (! $selectedChronicle) {
            return to_route('chronicle.index');
        }

        $chronicleCharacters = $selectedChronicle->characters;
        $chronicleCharacters->load('clan');

        return Inertia::render('Character/Index', [
            'characters' => $chronicleCharacters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Character $character)
    {
        $character->loadMissing('attributes');
        $character->loadMissing('predation');
        $character->loadMissing('clan');
        $character->loadMissing('compulsion');
        $character->loadMissing('bloodPotency');

        $disciplines = $character->powers->groupBy('discipline.name');

        return Inertia::render('Character/Show', [
            'character' => $character,
            'disciplines' => $disciplines,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
