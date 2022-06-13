<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email',
            'password' => 'required|min:4|max:8',
            'username' => 'required|min:4|max:10|unique:users,username',
        ]);

        if ($user = User::create($attributes)) {

            auth()->login($user);

            // return redirect('/home')->with('success','account created successfully!');
            return view('user.home',[
                'details' => $user,
            ]);
        }
    }
}
