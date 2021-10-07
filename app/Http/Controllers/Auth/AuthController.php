<?php

namespace App\Http\Controllers\Auth;

use App\Models\AuthMeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    function loginForm()
    {
        if (Auth::check())
        {
            return redirect()->to('/');
        }
        else
        {
            return view('auth.login');
        }
    }

    function loginPost(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:1|max:255',
            'password' => 'required|string|min:1|max:255'
        ]);

        if (Auth::attempt($validated))
        {
            $request->session()->regenerate();

            return redirect()->to('/');
        }
        else
        {
            return redirect()->back()->with('error', 'Helytelen felhasználónév vagy jelszó!');
        }
    }
}
