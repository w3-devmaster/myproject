<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('signup',[AdminController::class,'register_form'])->name('register-form');
    Route::post('register',[AdminController::class,'register'])->name('register');
    Route::get('login',[AdminController::class,'login_form'])->name('login-form');
    Route::post('auth',[AdminController::class,'auth'])->name('auth');

    Route::post('logout',[AdminController::class,'logout'])->name('logout');
});
