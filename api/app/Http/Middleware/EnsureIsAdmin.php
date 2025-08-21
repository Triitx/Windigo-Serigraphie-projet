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
    public function handle(Request $request)
    {
 
    if (!$request->user()) {
        return response()->json(['message' => 'Non authentifié'], 401);
    }

    if ($request->user()->role !== 'ROLE_ADMIN') {
        return response()->json(['message' => 'Accès interdit'], 403);
    }
    }
}
