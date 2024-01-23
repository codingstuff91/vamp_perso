<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class ConceptController extends Controller
{
    public function index(Request $request, Character $character)
    {
        return $character->concepts;
    }
}
