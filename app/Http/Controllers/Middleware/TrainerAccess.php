<?php

namespace App\Http\Controllers\Middleware;

use Closure;

/**
 * Middleware to control access to trainer-only routes
 */
class TrainerAccess
{
    public function handle($request, Closure $next)
    {
        // Check if user is logged in and has trainer role
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Please login first');
        }

        // Check if logged in user has trainer role
        if (!auth()->user()->isTrainer()) {
            return redirect()->route('dashboard')
                ->with('error', 'You need trainer privileges to access this area');
        }

        // Allow access if all checks pass
        return $next($request);
    }
}
