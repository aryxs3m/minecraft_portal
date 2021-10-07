<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController
{
    public function passwordChange()
    {
        return view('portal.password-change');
    }

    public function passwordChangePost(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|string|min:5|max:20|confirmed'
        ]);

        $user = Auth::user();
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->back()->with('success', true);
    }
}
