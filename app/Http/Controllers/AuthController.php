<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect(route('beranda'));
        }
        return inertia()->render('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            ActivityLog::create([
                'ip_add' => $request->ip(),
                'user' => auth()->user()->nama,
                'role' => auth()->user()->role,
                'activity' => "Logged in to system.",
            ]);
            return redirect(route('beranda'));
        }
        return back()->with(['error', 'Login failed!']);
    }

    public function logout(Request $request)
    {
        ActivityLog::create([
            'ip_add' => $request->ip(),
            'user' => auth()->user()->nama,
            'role' => auth()->user()->role,
            'activity' => "Logged out from system.",
        ]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
