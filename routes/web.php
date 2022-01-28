<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

//Agrupar rutas para vista de products para Admin

Route::get('/products', 'ProductController@index')->name('products.index')->middleware('AdminMiddleware', 'StatusMiddleware');

Route::get('products/create', 'ProductController@create')->name('products.create')->middleware('AdminMiddleware', 'StatusMiddleware');

Route::post('products', 'ProductController@store')->name('products.store')->middleware('AdminMiddleware', 'StatusMiddleware');

Route::get('products/{product}', 'ProductController@show')->name('products.show')->middleware('AdminMiddleware', 'StatusMiddleware');
Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')->middleware('AdminMiddleware', 'StatusMiddleware');
Route::match(['put','patch'], 'products/{product}', 'ProductController@update')->name('products.update')->middleware('AdminMiddleware', 'StatusMiddleware');

Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')->middleware('AdminMiddleware', 'StatusMiddleware');

//Agrupar rutas para vista de users para Admin

Route::get('/users', 'AdminController@index')->name('users.index')->middleware('AdminMiddleware', 'StatusMiddleware');

//Route::get('users/create', 'AdminController@create')->name('users.create')->middleware('AdminMiddleware', 'StatusMiddleware');

//Route::post('users', 'AdminController@store')->name('users.store')->middleware('AdminMiddleware', 'StatusMiddleware');

Route::get('users/{user}', 'AdminController@show')->name('users.show')->middleware('AdminMiddleware', 'StatusMiddleware');
Route::get('users/{user}/edit', 'AdminController@edit')->name('users.edit')->middleware('AdminMiddleware', 'StatusMiddleware');
Route::match(['put','patch'], 'users/{user}', 'AdminController@update')->name('users.update')->middleware('AdminMiddleware', 'StatusMiddleware');

//Route::delete('users/{userid}', 'AdminController@destroy')->name('users.destroy')->middleware('AdminMiddleware', 'StatusMiddleware');