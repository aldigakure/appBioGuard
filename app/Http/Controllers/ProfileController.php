<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.index');
    }

    public function edit()
    {
        return view('user.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'expertise' => 'nullable|string|max:100',
            'organization' => 'nullable|string|max:255',
        ]);
     

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $avatarPath = $user->avatar;

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($avatarPath && Storage::disk('public')->exists($avatarPath)) {
                Storage::disk('public')->delete($avatarPath);
            }
            
            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Update user data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatarPath,
            'phone' => $request->phone,
            'location' => $request->location,
            'bio' => $request->bio,
            'expertise' => $request->expertise,
            'organization' => $request->organization,
        ]);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
