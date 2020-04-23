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
        //category
        Route::get('/', 'AdminController@getIndex');
        Route::get('/category','CategoriesController@getCategories');
        Route::get('/category/addCate','CategoriesController@postAddCate');
        Route::post('/category/addCate','CategoriesController@postAddCate');
        Route::get('/category/editCate/{id}','CategoriesController@editCate');
        Route::post('/category/editCate/{id}','CategoriesController@editCate');
        Route::get('/category/deletecate/{id}','CategoriesController@deleteCate');
        Route::get('/category/search', 'CategoriesController@search');


        //product
        Route::get('/product','ProductController@getIndex');
        Route::get('/product/addPro','ProductController@postAddPro');
        Route::post('/product/addPro','ProductController@postAddPro');
       

    });

});
