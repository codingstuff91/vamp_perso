<?php

namespace App\Http\Middleware;

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

        return $next($request);
    }
}
