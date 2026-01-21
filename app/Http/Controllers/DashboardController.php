<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role && $user->role->role_name === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        if ($user->role && $user->role->role_name === 'jagawana') {
            return redirect()->route('jagawana.dashboard');
        }
        
        return redirect()->route('warga.dashboard');
    }

    /**
     * Dashboard untuk role Warga
     */
    public function wargaDashboard()
    {
        return view('user.warga.dashboard');
    }

    /**
     * Dashboard untuk role Jagawana
     */
    public function jagawanaDashboard()
    {
        return view('user.jagawana.dashboard');
    }
}
