<?php

use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'ApiUsersController@register')->name('apiusers.register');
Route::post('login', 'ApiUsersController@login')->name('apiusers.login');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', 'ApiUsersController@logout')->name('apiusers.logout');
    Route::apiResource('products', 'ApiProductController');
});
