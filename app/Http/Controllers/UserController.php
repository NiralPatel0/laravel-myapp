<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required | confirmed',
        ]);
        $user =  User::create($data);
        if ($user) {
            return redirect()->route('login')->with('success', 'User created successfully');
        } else {
            return back()->with('error', 'Failed to create user');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('expenses.index');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
