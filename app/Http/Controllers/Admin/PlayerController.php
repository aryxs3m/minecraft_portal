<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthMeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authMeUsers = AuthMeUser::all();

        return view('portal.admin.authMeUsers.index', compact('authMeUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portal.admin.authMeUsers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "username" => "required|string|min:3|max:16",
            "realname" => "required|string",
            "email" => "nullable|email",
            "password" => "required|string|min:5|max:20"
        ]);

        $validated['password'] = Hash::make($validated['password']);

        AuthMeUser::create($validated);

        return back()->with('message', 'item stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuthMeUser $authMeUser
     * @return \Illuminate\Http\Response
     */
    public function show(AuthMeUser $authMeUser)
    {
        return view('portal.admin.authMeUsers.show', compact('authMeUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthMeUser $authMeUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthMeUser $authMeUser)
    {
        return view('portal.admin.authMeUsers.edit', compact('authMeUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\AuthMeUser $authMeUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthMeUser $authMeUser)
    {
        $validated = $this->validate($request, [
            "username" => "required|string|min:3|max:16",
            "realname" => "required|string",
            "email" => "nullable|email"
        ]);

        $authMeUser->update($validated);

        return back()->with('message', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthMeUser $authMeUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthMeUser $authMeUser)
    {
        $authMeUser->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
