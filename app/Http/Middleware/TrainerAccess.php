<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrainerAccess
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'trainer') {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'Unauthorized access.');
    }
}