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

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Demo login - Accept demo credentials
        if ($request->email === 'admin@bioguard.id' && $request->password === 'password') {
            // Create a simple session for demo user
            session(['admin_user' => [
                'id' => 1,
                'name' => 'admin user',
                'email' => 'admin@bioguard.id'
            ]]);
            session(['is_authenticated' => true]);
            
            return redirect()->intended('dashboard');
        }

        // Try actual authentication if user model exists
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
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
