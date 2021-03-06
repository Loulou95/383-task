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


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::group(['namespace' => 'Api'], function () {
        Route::get('/', 'OpenWeatherController@index')->name('home');
        Route::post('/', 'OpenWeatherController@index')->name('search.location');
    });

    Route::group(['namespace' => 'User'], function () {
        Route::get('/list-of-users', 'UserListController@index')->name('user.list')->middleware('supper.admin');
    });
});

