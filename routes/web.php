<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\HomeController;
>>>>>>> 6aebb3413fc6116823e5a1dbe7debb6e4f2c878f
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'login');

<<<<<<< HEAD

Auth::routes();
=======
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
>>>>>>> 6aebb3413fc6116823e5a1dbe7debb6e4f2c878f

Route::get('register', [RegisterController::class, 'showRegistrationForm']);
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
});

Route::group(['middleware' => ['auth', 'user'], 'as' => 'user.'], function () {
    Route::get('home', HomeController::class);
});
