<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChronicle;
use App\Models\Chronicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChronicleController extends Controller
{
    public function index()
    {
        return Inertia::render('Chronicle/Index', [
            'chronicles' => Chronicle::all(),
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Chronicle/Create', [
            'user' => $request->user(),
        ]);
    }

    public function store(StoreChronicle $request)
    {
        Chronicle::create([
            'name' => $request->name,
            'details' => $request->details,
        ]);

        return to_route('chronicle.index');
    }
}
