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

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        // Check if user is logged in via Auth
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
            }
        }
        
        // Update session data (for demo/session-based login)
        if (session('admin_user')) {
            session(['admin_user' => [
                'id' => session('admin_user.id'),
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $avatarPath,
            ]]);
        }

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
