<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show general /login page or redirect based on auth status.
     */
    public function showLogin(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->isManager()) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }

        if ($request->is('admin*')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('user.login');
    }

    /**
     * Show the dedicated Admin Login portal.
     */
    public function showAdminLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->isManager()) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard')->with('error', 'You are logged in as an employee. Administrator access requires manager privileges.');
        }

        return view('auth.admin-login');
    }

    /**
     * Show the dedicated Employee/User Login portal.
     */
    public function showUserLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->isManager()) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }

        return view('auth.user-login');
    }

    /**
     * Process Admin Login (POST /admin/login).
     */
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if ($user->account_status !== 'active') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Your account is deactivated. Please contact the administrator.',
                ])->onlyInput('email');
            }

            // Strictly verify administrator / manager authority
            if (!$user->isManager()) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Access denied. You do not have administrator permissions. Please log in through the Employee Portal.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();

            AuditLog::log('admin_login_success', 'auth', 'users', $user->id, [
                'name' => $user->name,
                'email' => $user->email,
                'ip' => $request->ip(),
            ]);

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided administrator credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Process Employee / User Login (POST /user/login).
     */
    public function userLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if ($user->account_status !== 'active') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Your account is currently inactive. Please contact your manager.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();

            AuditLog::log('user_login_success', 'auth', 'users', $user->id, [
                'name' => $user->name,
                'email' => $user->email,
                'ip' => $request->ip(),
            ]);

            if ($user->isManager()) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('user.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided employee credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * General login handler for POST /login compatibility.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->account_status !== 'active') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Your account is currently inactive or suspended. Please contact your administrator.',
                ]);
            }

            AuditLog::log('login_success', 'auth', 'users', $user->id, [
                'name' => $user->name,
                'email' => $user->email,
            ]);

            if ($user->isManager()) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('user.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Admin Logout (POST /admin/logout).
     */
    public function adminLogout(Request $request)
    {
        $userId = Auth::id();
        if ($userId) {
            AuditLog::log('admin_logout', 'auth', 'users', $userId);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been logged out of the Administration Portal.');
    }

    /**
     * User Logout (POST /user/logout).
     */
    public function userLogout(Request $request)
    {
        $userId = Auth::id();
        if ($userId) {
            AuditLog::log('user_logout', 'auth', 'users', $userId);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login')->with('success', 'You have been logged out of your Workspace.');
    }

    /**
     * General Logout (GET|POST /logout).
     */
    public function logout(Request $request)
    {
        $userId = Auth::id();
        if ($userId) {
            AuditLog::log('user_logout', 'auth', 'users', $userId);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out securely.');
    }
}
