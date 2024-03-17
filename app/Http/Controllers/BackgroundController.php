<?php

namespace App\Http\Controllers;

use App\Models\Character;

class BackgroundController extends Controller
{
    public function index(Character $character)
    {
        $advantages = $character
            ->backgrounds
            ->where('category', 'Avantage')
            ->groupBy('type.name');

        $handicaps = $character
            ->backgrounds
            ->where('category', 'Handicap')
            ->groupBy('type.name');

        return [$advantages, $handicaps];
    }
}
