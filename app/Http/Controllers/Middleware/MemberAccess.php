<?php

namespace App\Http\Controllers\Middleware;

use Closure;

class MemberAccess
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isActiveMember()) {
            return redirect()->route('home')->with('error', 'Active membership required');
        }
        return $next($request);
    }
}
