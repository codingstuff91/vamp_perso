<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();

        return Inertia::render('Character/Index', [
            'characters' => $characters
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
