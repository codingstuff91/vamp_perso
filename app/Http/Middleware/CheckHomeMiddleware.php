<?php

namespace App\Http\Middleware;

use App\Models\Character;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckHomeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();

        if (empty($currentUser->chronicle_id) && $currentUser->role === 'game_master') {
            return to_route('chronicle.index', Auth::user());
        }

        if ($currentUser->role !== 'game_master' && empty($currentUser->character)) {
            return to_route('characters.show', Character::first());
        }

        return $next($request);
    }
}
