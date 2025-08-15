<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController
{
    public function index()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $credentials = $request->validated();
        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);
        Auth::login($user,true);
        return redirect('/');
    }
}
