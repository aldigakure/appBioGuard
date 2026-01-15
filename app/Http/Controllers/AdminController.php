<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of users for management.
     */
    public function users()
    {
        $users = User::with('role')->paginate(10);
        $roles = Role::where('role_name', '!=', 'admin')->get(); // Admin cannot promote someone to Admin
        
        return view('admin.users', compact('users', 'roles'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Update the specified user's role.
     */
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Validation: Cannot change own role (safety)
        if ($user->user_id === Auth::id()) {
            return back()->with('error', 'Anda tidak bisa mengubah peran Anda sendiri.');
        }

        $request->validate([
            'role_id' => 'required|exists:roles,role_id',
        ]);

        $newRole = Role::findOrFail($request->role_id);
        
        // Strict Security: Cannot promote to Admin
        if ($newRole->role_name === 'admin') {
            return back()->with('error', 'Pemberian akses Admin tambahan dilarang untuk keamanan sistem.');
        }

        // Check if the current user to be modified is an Admin (to prevent demoting the main admin)
        // Note: As per requirement "Cukup 1 Admin", we protect the admin role.
        if ($user->role->role_name === 'admin') {
             return back()->with('error', 'Peran Admin Utama tidak dapat diubah.');
        }

        $user->update([
            'role_id' => $request->role_id
        ]);

        return back()->with('success', 'Peran user ' . $user->name . ' berhasil diperbarui menjadi ' . $newRole->role_name);
    }
}
