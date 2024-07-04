<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('pages.login');
    }

    public function doLogin(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
                return redirect()->intended('tasks')->with('message', 'Login success!');
            }

            return redirect()->back()->with('error', 'Invalid credentials, please try again.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred: ' . $th->getMessage());
        }
    }

    public function registerForm()
    {
        return view('pages.register');
    }

    public function doRegister(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            Auth::login($user);

            return redirect()->intended('tasks')->with('message', 'Registration and login successful!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred: ' . $th->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Logged out successfully!');
    }
}
