<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Please login to access the administration portal.');
        }

        $user = auth()->user();

        if ($user->account_status !== 'active') {
            auth()->logout();
            return redirect()->route('admin.login')->with('error', 'Your account has been deactivated. Please contact the administrator.');
        }

        // Allow super_admin, admin, and manager for authorized admin routes
        if (!$user->isManager()) {
            abort(403, 'Unauthorized access: You do not have permission to view the administrative panel.');
        }

        return $next($request);
    }
}
