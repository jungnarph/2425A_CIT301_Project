<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileAdminController extends Controller
{
    public function index() {
        $user = auth()->user();
        return view("admin.profile", compact('user'));
    }

    public function update(Request $request) {
        $user = auth()->user();

        $request->validate([
            'First_name' => ['required', 'string', 'max:255'],
            'Middle_name' => ['nullable', 'string', 'max:255'],
            'Last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        if ($request->filled(['current_password', 'new_password'])) {
            $request->validate([
                'current_password' => ['required'],
                'new_password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            // Update password
            $user->password = Hash::make($request->new_password);
        }

        $user->First_name = $request->First_name;
        $user->Middle_name = $request->Middle_name;
        $user->Last_name = $request->Last_name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
    }

}
