<?php

use Illuminate\Support\Facades\Route;

Route::prefix('Admin')
    ->middleware(['auth', 'verified', 'AdminMiddleware', 'role:admin'])
    ->group(function () {
        Route::resource('products', 'ProductController');
        Route::resource('users', 'AdminController');
        Route::get('imports', 'ProductImportController@index')->name('imports.index');
        Route::post('imports', 'ProductImportController@import')->name('imports.import');
        Route::get('example', 'ProductImportController@example')->name('imports.example');
        Route::get('exports', 'ProductImportController@export')->name('exports.allproducts');
        Route::get('reports', 'ReportsController@index')->name('reports.index');
        Route::get('reports/export', 'ReportsController@export')->name('reports.export');
    });
