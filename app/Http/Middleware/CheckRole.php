<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
         if (auth()->check() && in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }
    
        return redirect()->route('access-denied');
    }
}
