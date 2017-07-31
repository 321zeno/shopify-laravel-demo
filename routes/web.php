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

Route::get('/', function () {
    return redirect(route('login'));
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'protected'], function () {
    // Only authenticated users may enter...
    Route::get('products', 'ProductController@index')->name('product.index');
    Route::get('products/new', 'ProductController@create')->name('product.create');
    Route::post('products/new', 'ProductController@store')->name('product.store');
    Route::post('product/image', 'ProductController@uploadImage')->name('product.image.upload');
    Route::post('product/image/remove', 'ProductController@removeImage')->name('product.image.remove');
});


