<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\{Home, User, Product, Transaction, Report, Member};

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/users', User::class)->name('users');
    Route::get('/products', Product::class)->name('products');
    Route::get('/transaction', Transaction::class)->name('transactions');
    Route::get('/report', Report::class)->name('reports');
    Route::get('/member', Member::class)->name('members');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');