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
Auth::routes();

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['api','cors']], function () {
////    Route::post('auth/login', 'ApiController@login');
//    Route::group(['middleware' => 'jwt.auth'], function () {
//        Route::get('user', 'AuthController@getAuthUser');
//    });
//});
//Route::post('login', 'AuthController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => ['api']], function () {
    Route::post('auth/login', 'ApiController@login');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('user', 'ApiController@getAuthUser');
    });
});

Route::group(['middleware' => 'jwt.refresh'], function(){
    Route::get('auth/refresh', 'ApiController@refresh');
});

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::post('auth/logout', 'ApiController@logout');

    Route::get('test', function () {
        return response()->json(['foo' => 'bar']);
    });
});


Route::group(['middleware' => ['api']], function () {
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('like', 'LikeController')->name('like.hit');
        Route::get('/', 'V1\ProductController@index');
        Route::post('/', 'V1\ProductController@getProductRank')->name('product.rank');

    });
});
Route::prefix('v1')->group(function () {
    Route::get('category/{id}', 'CategoryController@categoryWithProduct')->name('category.product');
    Route::get('category', 'CategoryController@index')->name('category.index');

});
//用prefix 出錯
//Route::prefix('v1')->group(function () {


Route::apiResource('/v1/post', 'V1\PostController');
Route::apiResource('/v1/product', 'V1\ProductController');

