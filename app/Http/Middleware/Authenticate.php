<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson() && !Auth::check()) {
            return route('login');
        }
        // Check if the user is banned
        if (Auth::check() && Auth::user()->banUser) {
            //log the user out
            Auth::logout();

            return redirect()->route('login')->withErrors(['message' => 'Your account has been banned.']);
        }

        return null;
    }
}
