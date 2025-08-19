<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EnsureIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
    // Vérifie d’abord si l’utilisateur est authentifié
    if (!$request->user()) {
        return response()->json(['message' => 'Non authentifié'], 401);
    }

    // Vérifie ensuite le rôle admin

 Log::info('Middleware EnsureIsAdmin: rôle de l’utilisateur', ['role' => $request->user()->role]);

    if ($request->user()->role !== 'ROLE_ADMIN') {
        Log::warning('Accès interdit: rôle non admin', ['role' => $request->user()->role]);
        return response()->json(['message' => 'Accès interdit'], 403);
    }
    }
}
