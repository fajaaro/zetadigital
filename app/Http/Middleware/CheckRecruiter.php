<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRecruiter
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role_id <= 3) {
            return $next($request);
        }

        if ($user) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }
}
