<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChronicle;
use App\Models\Chronicle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChronicleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $chronicles = Auth::user()->chronicle ?? Chronicle::all();

        return Inertia::render('Chronicle/Index', [
            'chronicles' => $chronicles,
            'user' => $user,
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

    public function select(Request $request, User $user)
    {
        $user->chronicle_id = $request->chronicle_id;
        $user->save();
    }
}
