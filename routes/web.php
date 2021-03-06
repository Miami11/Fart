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
Route::prefix('backend')->group(function() {
    Route::get('/login', function () {
        return view('admin.Login.login');
    });

    Route::resource('products', 'Admin\ProductController');
    Route::resource('posts', 'Admin\PostController');
});

Route::get('/', function () {
    return view('admin.index');
});

Route::get('products', 'ProductController@products');
Route::get('product_detail', 'ProductController@detail');

Route::prefix('entry')->group(function() {
	Route::get('login','ProductController@show');
	Route::get('register','ProductController@test');
});

Route::get('file', 'ProductController@index');
Route::post('upload','ProductController@upload')->name('admin.upload');


Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');