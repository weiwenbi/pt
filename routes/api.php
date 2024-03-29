<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'api'], function () {
    Route::post('/login', 'UserController@login')->name('login');
    Route::post('/register', 'UserController@register')->name('register');
});

Route::group(['middleware' => 'auth:api', 'namespace' => 'api'], function() {
    Route::get('/passport', 'UserController@passport')->name('passport');
    Route::get('/logout', 'UserController@logout')->name('logout');
});

