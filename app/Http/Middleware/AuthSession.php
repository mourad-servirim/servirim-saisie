<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('user_name')) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }
        return $next($request);
    }
}
