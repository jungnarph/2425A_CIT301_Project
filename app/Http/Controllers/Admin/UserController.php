<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.manage', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'First_name' => ['required', 'string', 'max:255'],
            'Middle_name' => ['nullable', 'string', 'max:255'],
            'Last_name' => ['required', 'string', 'max:255'],
            'usertype' => ['required','string','in:User,Admin'],
            'Contact_number' => ['nullable', 'string', 'regex:/^09\d{9}$/', 'unique:users,Contact_number'],
            'Driver_license_ID' => ['nullable', 'string', 'max:255', 'unique:users,Driver_license_ID', 'regex:/^[A-Z]\d{2}-\d{2}-\d{6}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'username.unique' => 'The username has already been taken.',
            'email.unique' => 'The email has already been taken.',
            'Contact_number.unique' => 'The contact number has already been taken.',
            'Driver_license_ID.unique' => 'The driver license ID has already been taken.',
            'password.confirmed' => 'The password confirmation does not match.',
            'Driver_license_ID.regex' => 'The driver license ID format is invalid. It should match the format XYY-YY-YYYYYY.',
            'Contact_number.regex' => 'The contact number must be valid and contain exactly 11 digits.',
        ]);
    
        $user = User::create([
            'username' => $request->username,
            'First_name' => $request->First_name,
            'Middle_name' => $request->Middle_name,
            'Last_name' => $request->Last_name,
            'usertype' => $request->usertype,
            'Contact_number' => $request->Contact_number,
            'Driver_license_ID' => $request->Driver_license_ID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('manage.users')->with('success', 'User created successfully.');
    }

    public function view ($id) {
        $user = User::findOrFail($id);
        return view('admin.users.detail', compact('user'));
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('manage.users')->with('success', 'User "'. $user->username .'" deleted successfully.');
    }
}
