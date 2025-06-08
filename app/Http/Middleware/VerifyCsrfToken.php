<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyCsrfToken
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('api/*')) {
            // Disable CSRF protection for API routes
            return $next($request);
        }

        return parent::handle($request, $next);
    }
}
