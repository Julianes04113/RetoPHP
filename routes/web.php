<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\UserEditController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::prefix('Admin')
    ->middleware(['auth', 'verified', 'AdminMiddleware'])
    ->group(function () {
        Route::resource('products', 'ProductController');
        Route::resource('users', 'AdminController');
    });

Route::prefix('Market')
    ->middleware(['auth', 'verified', 'StatusMiddleware'])
    ->group(function () {
        Route::get('products', 'UserProductController@index')->name('UserProduct.index');
        Route::get('products/{$id}', 'UserProductController@show')->name('UserProduct.show');
        Route::resource('products.cart', 'ProductCartController')->only('store', 'destroy');
        Route::resource('orders', 'OrderController')->only('create', 'store');
        Route::resource('carts', 'CartController')->only('index');
        Route::resource('orders.payments', 'OrderPaymentController');
        Route::post('orders.payments.webcheckout/{order}', 'OrderPaymentController@webcheckout')
            ->name('orders.payments.webcheckout');
        Route::get('/Profile', 'UserEditController@edit')->name('Profile');
        Route::put('/Profile', 'UserEditController@update')->name('Profile.update');
        Route::get('/successfullRobery/{order}', 'OrderPaymentController@handle')->name('successfullRobery');
        Route::get('/unsuccessfullRobery', 'OrderPaymentController@cancelled')->name('unsuccessfullRobery');
    });
