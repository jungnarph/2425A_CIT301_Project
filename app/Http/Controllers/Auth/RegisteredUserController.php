<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'First_name' => ['required', 'string', 'max:255'],
            'Middle_name' => ['nullable', 'string', 'max:255'],
            'Last_name' => ['required', 'string', 'max:255'],
            'Contact_number' => ['nullable', 'string', 'max:15', 'unique:users,Contact_number'],
            'Driver_license_ID' => ['nullable', 'string', 'max:255', 'unique:users,Driver_license_ID'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'username.unique' => 'The username has already been taken.',
            'email.unique' => 'The email has already been taken.',
            'Contact_number.unique' => 'The contact number has already been taken.',
            'Driver_license_ID.unique' => 'The driver license ID has already been taken.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);
    
        $user = User::create([
            'username' => $request->username,
            'First_name' => $request->First_name,
            'Middle_name' => $request->Middle_name,
            'Last_name' => $request->Last_name,
            'usertype' => 'user',
            'Contact_number' => $request->Contact_number,
            'Driver_license_ID' => $request->Driver_license_ID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        event(new Registered($user));
    
        Auth::login($user);
    
        return redirect(route('landing', absolute: false));
    }
}
