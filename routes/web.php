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

Route::middleware('auth')->group(function(){
    Route::get('/logout', function (){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->to('/login');
    });

    Route::get('/home', [\App\Http\Controllers\Portal\DashboardController::class, 'index']);

    Route::get('/skin', [\App\Http\Controllers\Portal\SkinController::class, 'skin']);
    Route::post('/skin', [\App\Http\Controllers\Portal\SkinController::class, 'skinSave']);

    Route::get('/password-change', [\App\Http\Controllers\Portal\PasswordController::class, 'passwordChange']);
    Route::post('/password-change', [\App\Http\Controllers\Portal\PasswordController::class, 'passwordChangePost']);

    Route::prefix("/admin")->group(function(){

        Route::prefix('/players')->group(function(){
            Route::get('/', [\App\Http\Controllers\Admin\PlayerController::class, 'index']);
            Route::get('/create', [\App\Http\Controllers\Admin\PlayerController::class, 'create']);
            Route::get('/edit/{authMeUser}', [\App\Http\Controllers\Admin\PlayerController::class, 'edit']);
            Route::post('/update/{authMeUser}', [\App\Http\Controllers\Admin\PlayerController::class, 'update']);
            Route::post('/store', [\App\Http\Controllers\Admin\PlayerController::class, 'store']);
            Route::post('/destroy/{authMeUser}', [\App\Http\Controllers\Admin\PlayerController::class, 'destroy']);
        });

        Route::prefix('/rcon-edit-simple')->group(function(){
            Route::get('/', [\App\Http\Controllers\Admin\RCONEditController::class, 'index']);
            Route::get('/create', [\App\Http\Controllers\Admin\RCONEditController::class, 'create']);
            Route::get('/edit/{simpleRCONElement}', [\App\Http\Controllers\Admin\RCONEditController::class, 'edit']);
            Route::post('/update/{simpleRCONElement}', [\App\Http\Controllers\Admin\RCONEditController::class, 'update']);
            Route::post('/store', [\App\Http\Controllers\Admin\RCONEditController::class, 'store']);
            Route::post('/destroy/{simpleRCONElement}', [\App\Http\Controllers\Admin\RCONEditController::class, 'destroy']);
        });

        Route::get('/rcon-simple', [\App\Http\Controllers\Admin\SimpleRCONController::class, 'index']);
        Route::post('/rcon-simple/command', [\App\Http\Controllers\Admin\SimpleRCONController::class, 'send']);
        Route::post('/rcon-simple/kick', [\App\Http\Controllers\Admin\SimpleRCONController::class, 'kick']);
    });
});
