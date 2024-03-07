<?php

namespace App\Http\Controllers;

use App\Actions\Compulsions\GetCompulsionsListAction;
use App\Models\Character;

class CompulsionController extends Controller
{
    public function index(Character $character)
    {
        $compulsions = app(GetCompulsionsListAction::class)->execute($character);

        return $compulsions;
    }
}
