<?php

use App\Http\Controllers\Admin\CapsterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('canvas', function () {
    return view('pages.user.canvas');
});

Route::redirect('/', 'login');

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm']);
Route::post('register', [RegisterController::class, 'register'])->name('register');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('capsters', CapsterController::class)->except('show');
});

Route::group(['middleware' => ['auth', 'user'], 'as' => 'user.'], function () {
    Route::get('home',      [UserController::class, 'index'])->name('home');
    Route::get('detail',    [UserController::class, 'detail'])->name('detail');
    Route::get('profile',   [UserController::class, 'profile'])->name('profile');
    Route::get('about',     [UserController::class, 'about'])->name('about');
});
