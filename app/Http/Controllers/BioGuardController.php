<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BioGuardController extends Controller
{
    /**
     * Display the BioGuard Flora page
     */
    public function flora()
    {
        return view('bioguard-flora');
    }

    /**
     * Display the BioGuard Fauna page
     */
    public function fauna()
    {
        return view('bioguard-fauna');
    }
}
