<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controllers([
    'user' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['namespace' => 'Admin'], function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'DashboardController@getIndex');
        Route::controller('dashboard', 'DashboardController');
        Route::resource('retailers', 'RetailersController');
    });
});
