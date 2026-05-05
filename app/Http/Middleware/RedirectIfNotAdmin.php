<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == "admin") {
            return $next($request);
        }

        return redirect()->route('auth.login')->with('error', 'You do not have permission to access this page.');
    }
}
