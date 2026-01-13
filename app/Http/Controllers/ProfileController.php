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
        return view('profile');
    }

    public function edit()
    {
        return view('profile-edit');
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

        $avatarPath = session('admin_user.avatar');

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($avatarPath && Storage::disk('public')->exists($avatarPath)) {
                Storage::disk('public')->delete($avatarPath);
            }
            
            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Check if user is logged in via Auth (Database Update - simplified to only existing fields)
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user) {
                $user->name = $request->name;
                $user->email = $request->email;
                if ($request->organization) {
                    $user->organization = $request->organization;
                }
                $user->save();
            }
        }
        
        // Update session data (for demo/session-based login)
        // Persist all fields including new ones to session
        if (session('admin_user')) {
            $userData = session('admin_user');
            $userData['name'] = $request->name;
            $userData['email'] = $request->email;
            $userData['avatar'] = $avatarPath;
            $userData['phone'] = $request->phone;
            $userData['location'] = $request->location;
            $userData['bio'] = $request->bio;
            $userData['expertise'] = $request->expertise;
            $userData['organization'] = $request->organization;
            
            session(['admin_user' => $userData]);
        }

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
