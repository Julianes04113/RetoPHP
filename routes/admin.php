<?php

use Illuminate\Support\Facades\Route;

Route::prefix('Admin')
    ->middleware(['auth', 'verified', 'AdminMiddleware', 'role:admin'])
    ->group(function () {
        Route::resource('products', 'ProductController');
        Route::resource('users', 'AdminController');
        Route::get('imports', 'ProductImportController@index')->name('imports.index');
        Route::get('example', 'ProductImportController@example')->name('imports.example');
    });
