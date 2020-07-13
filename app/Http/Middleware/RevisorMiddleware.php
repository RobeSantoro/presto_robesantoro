<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RevisorMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->is_revisor) {

            return $next($request);
        }

        return redirect()->back()->with('access.denied.revisor.only' , 'access denied');
    }
}
