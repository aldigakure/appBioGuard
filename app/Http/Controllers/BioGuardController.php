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
        return view('main_feature.bioguard-flora');
    }

    /**
     * Display the BioGuard Fauna page
     */
    public function fauna()
    {
        return view('main_feature.bioguard-fauna');
    }

    /**
     * Display the Interactive Indonesia Map page
     */
    public function peta()
    {
        return view('main_feature.ecodetect');
    }

    /**
     * Display the Bio-AI Reforestation Dashboard
     */
    public function bioAi()
    {
        return view('main_feature.bio-ai');
    }
}
