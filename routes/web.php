<?php

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

use Illuminate\Support\Facades\Storage;

Route::get('/', 'MainController');

Route::get('user/get-data', 'UserController@getUserData');

Route::post('auth/login', 'AuthController@login');

//Только авторизованные пользователи
Route::group(['middleware' => 'auth'], function () {

    Route::get('auth/logout', 'AuthController@logout');

    Route::get('order/create', 'OrderController@create');

    Route::get('order/get/{orderId?}', 'OrderController@get');

    Route::get('order/search-data', 'OrderController@searchData');

    Route::get('services/{service_name}/get', 'ServiceController@get');
});



