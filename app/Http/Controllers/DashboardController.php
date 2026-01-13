<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Check for demo user or authenticated user
        if (!session('is_authenticated') && !Auth::check()) {
            return redirect()->route('login');
        }
        return view('dashboard');
    }
}
