<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // If the user is authenticated, redirect to the dashboard
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        // Otherwise, continue the request
        return $next($request);
    }
}
