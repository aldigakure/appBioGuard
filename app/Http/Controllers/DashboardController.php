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
            return redirect()->route(route: 'admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    }

    public function userDashboard()
    {
        return view('user.dashboard');
    }
}
