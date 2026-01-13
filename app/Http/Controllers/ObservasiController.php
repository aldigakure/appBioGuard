<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObservasiController extends Controller
{
    public function observasi()
    {
        return view('observasi');
    }

    public function create()
    {
        return view('observasi-create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'species_name' => 'required|string|max:255',
            'latin_name' => 'nullable|string|max:255',
            'category' => 'required|string',
            'observation_date' => 'required|date',
            'location' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'description' => 'nullable|string',
            'population_count' => 'nullable|integer|min:1',
            'weather' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // TODO: Save the observation to database
        // For now, just redirect back with success message

        return redirect()->route('observasi')->with('success', 'Observasi berhasil ditambahkan!');
    }
}
