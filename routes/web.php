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
});
