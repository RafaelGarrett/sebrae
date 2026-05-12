<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/create-user', [UserController::class, 'create'])->name('users.create');
Route::post('/store-user', [UserController::class, 'store'])->name('users.store');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'destroy')->name('login.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create-customer', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/store-customer', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/show-customer/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/edit-customer/{customer}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/update-customer/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/delete-customer/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy')->middleware('can:access');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('can:access');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('users.update')->middleware('can:access');
    Route::delete('/delete-user/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('can:access');
});
