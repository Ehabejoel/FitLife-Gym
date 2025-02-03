<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrainerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user() || !$request->user()->isTrainer()) {
            return redirect()->route('dashboard')
                ->with('error', 'Unauthorized access. Trainer privileges required.');
        }

        return $next($request);
    }
}