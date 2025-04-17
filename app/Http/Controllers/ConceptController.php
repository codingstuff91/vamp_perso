<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Database\Eloquent\Collection;

class ConceptController extends Controller
{
    public function index(Character $character): Collection
    {
        /** @phpstan-ignore-next-line */
        return $character->concepts;
    }
}
