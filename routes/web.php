<?php

use App\Http\Controllers\Admin\BarberController;
use App\Http\Controllers\Owner\CapsterController;
use App\Http\Controllers\Owner\FacilityController;
use App\Http\Controllers\Owner\OrderController;
use App\Http\Controllers\Owner\ServiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Owner\BarberController as OwnerBarberController;
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
    Route::get('barbers/{barber}/order', [BarberController::class, 'order'])->name('barbers.order');
    Route::get('barbers/{barber}/facilites', [BarberController::class, 'facilities'])->name('barbers.facilities');
    Route::get('barbers/{barber}/services', [BarberController::class, 'services'])->name('barbers.services');
    Route::get('barbers/{barber}/capsters', [BarberController::class, 'capsters'])->name('barbers.capsters');
    Route::resource('barbers', BarberController::class)->except('show');
});

Route::group(['middleware' => ['auth', 'owner'], 'as' => 'owner.', 'prefix' => 'owner'], function () {
    Route::resource('capsters', CapsterController::class)->except(['show']);
    Route::get('orders', [OrderController::class, 'index'])->name('order.index');
    Route::post('orders/{order}', [OrderController::class, 'update'])->name('order.update');
    Route::resource('facilities', FacilityController::class)->except(['show']);
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::get('barber', [OwnerBarberController::class, 'edit'])->name('barber.edit');
    Route::put('barber/{barber}', [OwnerBarberController::class, 'update'])->name('barber.update');
});

Route::group(['middleware' => ['auth', 'user'], 'as' => 'user.'], function () {
    Route::get('home',                  [UserController::class, 'index'])->name('home');
    Route::get('detail/{barber}',       [UserController::class, 'detail'])->name('detail');
    Route::get('capsters/{barber}',      [UserController::class, 'capster'])->name('capster');
    Route::get('booking/{barber}',      [UserController::class, 'booking'])->name('booking');
    Route::post('booking/{barber}',     [UserController::class, 'bookingStore'])->name('booking.store');
    Route::get('profile',               [UserController::class, 'profile'])->name('profile');
    Route::get('about',                 [UserController::class, 'about'])->name('about');
    Route::post('review',               [UserController::class, 'review'])->name('review');
    Route::post('cancel',               [UserController::class, 'cancel'])->name('cancel');
});
