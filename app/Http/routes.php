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

use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('home');
});

Route::controllers([
    'user' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'DashboardController@getIndex');
    Route::controller('dashboard', 'DashboardController');
    Route::resource('retailers', 'RetailersController');
    Route::resource('deals', 'DealsController');
    Route::resource('categories', 'CategoriesController');
});

Route::group(['namespace' => 'Account', 'prefix' => 'account', 'middleware' => 'auth'], function() {
    Route::get('/', 'SettingController@getIndex');
    Route::controller('setting', 'SettingController');
});

Route::get('/images/{filename}', function ($filename) {
    if (Storage::has('images/' . $filename)) {
        $file = Storage::get('images/' . $filename);
        $type = Storage::mimeType('images/' . $filename);
        return response($file)->header('Content-Type', $type);
    }
});
