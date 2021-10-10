<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (\Illuminate\Support\Facades\Auth::check())
    {
        return redirect()->to('/home');
    }
    else
    {
        return redirect()->to('/login');
    }
});

Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'loginForm'])->name("login");
Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'loginPost']);

Route::get('/register', [\App\Http\Controllers\Auth\RegistrationController::class, 'register']);
Route::post('/register', [\App\Http\Controllers\Auth\RegistrationController::class, 'postRegister']);

Route::get('/invite', [\App\Http\Controllers\Auth\RegistrationController::class, 'invite'])->middleware('signed')->name('invite');
Route::post('/invite', [\App\Http\Controllers\Auth\RegistrationController::class, 'postInvite'])->middleware('signed');

Route::middleware('auth')->group(function(){
    Route::get('/logout', function (){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->to('/login');
    });

    Route::get('/home', [\App\Http\Controllers\Portal\DashboardController::class, 'index']);

    Route::get('/skin', [\App\Http\Controllers\Portal\SkinController::class, 'skin'])->middleware('can:user.skin.change');
    Route::post('/skin', [\App\Http\Controllers\Portal\SkinController::class, 'skinSave'])->middleware('can:user.skin.change');

    Route::get('/password-change', [\App\Http\Controllers\Portal\PasswordController::class, 'passwordChange']);
    Route::post('/password-change', [\App\Http\Controllers\Portal\PasswordController::class, 'passwordChangePost']);

    Route::prefix("/admin")->group(function(){

        Route::prefix('/players')->group(function(){
            Route::get('/', [\App\Http\Controllers\Admin\PlayerController::class, 'index'])->middleware('can:admin.players.list');
            Route::get('/create', [\App\Http\Controllers\Admin\PlayerController::class, 'create'])->middleware('can:admin.players.create');
            Route::get('/edit/{authMeUser}', [\App\Http\Controllers\Admin\PlayerController::class, 'edit'])->middleware('can:admin.players.modify');
            Route::post('/update/{authMeUser}', [\App\Http\Controllers\Admin\PlayerController::class, 'update'])->middleware('can:admin.players.modify');
            Route::get('/edit-roles/{authMeUser}', [\App\Http\Controllers\Admin\PlayerController::class, 'editRoles'])->middleware('can:admin.users.manage_roles');
            Route::post('/update-roles/{authMeUser}', [\App\Http\Controllers\Admin\PlayerController::class, 'updateRoles'])->middleware('can:admin.users.manage_roles');
            Route::post('/store', [\App\Http\Controllers\Admin\PlayerController::class, 'store'])->middleware('can:admin.players.create');
            Route::post('/destroy/{authMeUser}', [\App\Http\Controllers\Admin\PlayerController::class, 'destroy'])->middleware('can:admin.players.delete');
            Route::post('/invite', [\App\Http\Controllers\Admin\PlayerController::class, 'invite'])->middleware('can:admin.players.invite');
        });

        Route::prefix('/rcon-edit-simple')->middleware('can:admin.rcon.edit_simple')->group(function(){
            Route::get('/', [\App\Http\Controllers\Admin\RCONEditController::class, 'index']);
            Route::get('/create', [\App\Http\Controllers\Admin\RCONEditController::class, 'create']);
            Route::get('/edit/{simpleRCONElement}', [\App\Http\Controllers\Admin\RCONEditController::class, 'edit']);
            Route::post('/update/{simpleRCONElement}', [\App\Http\Controllers\Admin\RCONEditController::class, 'update']);
            Route::post('/store', [\App\Http\Controllers\Admin\RCONEditController::class, 'store']);
            Route::post('/destroy/{simpleRCONElement}', [\App\Http\Controllers\Admin\RCONEditController::class, 'destroy']);
        });

        Route::get('/rcon-simple', [\App\Http\Controllers\Admin\SimpleRCONController::class, 'index'])->middleware('can:admin.rcon.simple');
        Route::post('/rcon-simple/command', [\App\Http\Controllers\Admin\SimpleRCONController::class, 'send'])->middleware('can:admin.rcon.simple');
        Route::post('/rcon-simple/kick', [\App\Http\Controllers\Admin\SimpleRCONController::class, 'kick'])->middleware('can:admin.rcon.simple');

        Route::get('/logs', [\App\Http\Controllers\Admin\LogsController::class, 'index'])->middleware('can:admin.logs');
    });
});
