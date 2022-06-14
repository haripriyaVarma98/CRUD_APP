<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('user.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($attributes)) {
            return view('user.home', [
                'details' => User::firstWhere('username', $attributes['username']),
            ]);
            // return redirect('/home')->with('success','welcome');
        }

        throw ValidationException::withMessages([
            'error' => 'Invalid credentials! please enter correct username/password'
        ]);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'logout successfully!');
    }
}
