<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    // handle auth request.
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = $request->user();

            return match ($user->role) {
                'admin' => redirect()->intended('admin.dashboard'),
                'user' => redirect()->intended('/dashboard'),
                default => abort(403)
            };


        }
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Placeholder for registration logic
        // Since backend is not required yet, we just redirect to login
        return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->forget(['admin_user', 'is_authenticated']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
