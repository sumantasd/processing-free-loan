<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('user.login')->with('error', 'Please login to access your employee portal.');
        }

        $user = auth()->user();

        if ($user->account_status !== 'active') {
            auth()->logout();
            return redirect()->route('user.login')->with('error', 'Your account has been deactivated. Please contact the administrator.');
        }

        return $next($request);
    }
}
