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

        if ($this->isGameMasterWithoutAChronicle($currentUser)) {
            return to_route('chronicle.index');
        }

        if ($this->isPlayerWithCharacter($currentUser)) {
            return to_route('characters.show', $currentUser->characters->first()->id);
        }

        if ($this->isPlayerWithoutCharacter($currentUser)) {
            return to_route('characters.index');
        }

        return $next($request);
    }

    public function isGameMasterWithoutAChronicle(?\Illuminate\Contracts\Auth\Authenticatable $currentUser): bool
    {
        return $currentUser->role === 'game_master' && empty($currentUser->chronicle_id);
    }

    public function isPlayerWithCharacter(?\Illuminate\Contracts\Auth\Authenticatable $currentUser): bool
    {
        return $currentUser->role === 'player' && $currentUser->characters()->exists();
    }

    public function isPlayerWithoutCharacter(?\Illuminate\Contracts\Auth\Authenticatable $currentUser): bool
    {
        return $currentUser->role === 'player' && ! $currentUser->characters()->exists();
    }
}
