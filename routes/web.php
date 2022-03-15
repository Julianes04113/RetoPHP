<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserProductController;

Route::get('/', function () {return view('welcome');});

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('Admin')
    ->middleware(['auth','verified','AdminMiddleware'])
    ->group( function(){
        Route::resource('products', 'ProductController');
        Route::resource('users','AdminController');
    });

Route::prefix('Market')
    ->middleware(['auth','verified','StatusMiddleware'])
    ->group( function(){
        Route::resource('products', 'UserProductController')->only('index','show');
        Route::view('/MyProfile', 'Market.MyProfile.Profile')->name('MyProfile');
        Route::resource('products.cart','ProductCartController')->only('store', 'destroy');
        Route::resource('orders','OrderController')->only('create', 'store');
        Route::resource('carts','CartController')->only('index');
        Route::resource('orders.payments','OrderPaymentController')->only('create', 'store');

    });







//Route::fallback(function () {
  //  dd('La Cagaste');
//});