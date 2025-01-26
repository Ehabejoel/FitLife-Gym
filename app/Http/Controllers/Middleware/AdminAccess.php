<?php

namespace App\Http\Controllers\Middleware;

use Closure;

class AdminAccess
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }
        return $next($request);
    }
}
