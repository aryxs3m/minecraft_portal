<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $userRole = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'user.skin.change']);

        Permission::create(['name' => 'admin.players.list']);
        Permission::create(['name' => 'admin.players.create']);
        Permission::create(['name' => 'admin.players.modify']);
        Permission::create(['name' => 'admin.players.delete']);
        Permission::create(['name' => 'admin.players.invite']);

        Permission::create(['name' => 'admin.rcon.simple']);
        Permission::create(['name' => 'admin.rcon.expert']);
        Permission::create(['name' => 'admin.rcon.edit_simple']);

        Permission::create(['name' => 'admin.users.manage_roles']);

        $userRole->givePermissionTo(['user.skin.change']);
        $adminRole->givePermissionTo(Permission::all());

        foreach (\App\Models\AuthMeUser::all() as $user)
        {
            $user->assignRole($userRole);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Permission::truncate();
        Role::truncate();
    }
}
