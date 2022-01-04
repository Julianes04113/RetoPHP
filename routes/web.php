<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('auth/login');})->name('main');

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('products', function () {
    return 'Esta es la lista de productos';})->name('products.index');

Route::get('products/create', function () {
    return 'Este es el formulario para crear un producto';})->name('products.create');

Route::post('products', function () {
    })->name('products.store');

Route::get('products/{product}', function ($product){ 
    return "Mostrando el producto con ID {$product}";})->name('products.show');
Route::get('products/{product}/edit', function ($product){ 
    return "Mostrando el formulario para editar el producto con ID {$product}";})->name('products.edit');
Route::match(['put','patch'], 'products/{product}', function ($product){ 
    ;})->name('products.update');

Route::delete('products/{product}', function ($product){ 
    ;})->name('products.destroy');