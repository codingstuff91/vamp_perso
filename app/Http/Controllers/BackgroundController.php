<?php

namespace App\Http\Controllers;

use App\Models\Character;

class BackgroundController extends Controller
{
    public function index(Character $character)
    {
        return $character->backgrounds;
    }
}
