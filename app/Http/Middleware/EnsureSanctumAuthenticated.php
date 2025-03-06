<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\AuthenticationException;

class EnsureSanctumAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if (!auth('sanctum')->check()) {
                throw new AuthenticationException();
            }
            return $next($request);
        } catch (AuthenticationException $e) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
