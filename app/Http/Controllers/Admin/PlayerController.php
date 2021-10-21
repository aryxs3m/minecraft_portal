<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthMeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $authMeUsers = AuthMeUser::all();

        return view('portal.admin.authMeUsers.index', compact('authMeUsers'));
    }

    public function invite()
    {
        $tempURL = URL::temporarySignedRoute('invite', now()->addDay());
        return redirect()->back()->with('message', $tempURL);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('portal.admin.authMeUsers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(AuthMeUser $authMeUser)
    {
        return view('portal.admin.authMeUsers.show', compact('authMeUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthMeUser $authMeUser
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
     * @return \Illuminate\Http\RedirectResponse
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthMeUser $authMeUser
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function editRoles(AuthMeUser $authMeUser)
    {
        $roles = Role::all();
        $userRoles = $authMeUser->getRoleNames()->toArray();

        $permissions = Permission::all();
        $userPermissions = $authMeUser->getPermissionNames()->toArray();
        return view('portal.admin.authMeUsers.edit-roles', compact('authMeUser', 'roles', 'userRoles', 'permissions', 'userPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\AuthMeUser $authMeUser
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRoles(Request $request, AuthMeUser $authMeUser)
    {
        $roles = [];
        $permissions = [];

        foreach ($request->all() as $key => $value) {
            if (Str::startsWith($key, 'role_')) {
                $roles[] = $value;
            }

            if (Str::startsWith($key, 'permission_')) {
                $permissions[] = $value;
            }
        }

        $authMeUser->syncRoles($roles);
        $authMeUser->syncPermissions($permissions);

        return back()->with('message', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthMeUser $authMeUser
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AuthMeUser $authMeUser)
    {
        $authMeUser->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
