<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    // Show Login Form
    public function login() {
        return view('users/login');
    }

    // Show Register/Create Form
    public function register() {
        return view('users/register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Show Profile Page
    public function edit(User $user) {
        // Pulling data for user in session
        $user = User::find(auth()->user()->id);

        return view('/users/profile', ['user' => $user]);
    }

    // Update User Profile
    public function update(Request $request) {
        // Pulling data for user in session
        $user = User::find(auth()->user()->id);

        // Compare Password Input vs Hash Password from Database 'users'
        if(Hash::check($request->input('oldPassword'), $user->password) == false) {
            abort(403, 'Wrong password');
        }

        if($request->input('password') != $request->input('password_confirmation')) {
            return back()->with('error', 'Passwords do not match.');
        }
        
        // Validation
        if($request->input('password') == "") {
            $formFields = $request->validate([
                'name' => 'sometimes',
                'email' => ['sometimes', 'email'],
            ]);
            $user->update($formFields);
        } elseif($request->input('password') == $request->input('password_confirmation')) {
            $formFields = $request->validate([
                'name' => 'sometimes',
                'email' => ['sometimes', 'email'],
                'password' => 'sometimes'
            ]);
            $formFields['password'] = bcrypt($request->input('password'));
            $user->update($formFields);
        }
        

        // Update User
        //$user->update($formFields);

        return redirect('/')->with('message', 'User updated');
    }
}
