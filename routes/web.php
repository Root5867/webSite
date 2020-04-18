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

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function() {
    Route::get('login', 'AdminController@getLogin');
	Route::post('login', 'AdminController@postLogin');
    Route::get('logout', 'AdminController@logOut');

    
    Route::middleware(['checklogin'])->group(function () {
        Route::get('/', 'AdminController@getIndex');
        Route::get('/category', function () {
            return view('admin/Category/index');
        });
    });

});
