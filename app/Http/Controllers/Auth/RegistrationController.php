<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthMeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register()
    {
        if (!config('app.open_registration'))
        {
            return redirect()->to('/login');
        }
        return view('auth.register', ['invite' => false]);
    }

    public function invite()
    {
        return view('auth.register', ['invite' => true]);
    }

    public function postRegister(Request $request)
    {
        if (!config('app.open_registration')) { return redirect()->to('/'); }
        $this->registerUser($request);
        return redirect()->to('/home');
    }

    public function postInvite(Request $request)
    {
        $this->registerUser($request);
        return redirect()->to('/home');
    }

    private function registerUser(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|string|min:5|max:20|confirmed',
            'username' => 'required|string|min:1|max:16|unique:authme,username',
            'realname' => 'required|string|min:1|max:16',
            'email' => 'nullable|email'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = AuthMeUser::create($validated);
        $user->save();

        $user->assignRole('user');

        Auth::login($user);
    }
}
