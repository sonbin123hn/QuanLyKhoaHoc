<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

$publicRoutes = function () {
    Route::group(['prefix' => 'v1'], function () {
        //authendicate
        Route::post('/auth/login',   'App\Http\Controllers\api\v1\AuthController@authenticate');
        Route::get('/auth/logout',   'App\Http\Controllers\api\v1\AuthController@logout');
        Route::post('/auth/register',   'App\Http\Controllers\api\v1\AuthController@register');
        Route::post('/auth/name',   'App\Http\Controllers\api\v1\AuthController@CheckEmail');
        //Home
        Route::get('/auth/home',   'App\Http\Controllers\api\v1\HomeController@home');
        
    });
};

Route::middleware([])->group($publicRoutes);
Route::group(['prefix' => 'v1','middleware' => 'auth:api'],function(){
    Route::group(['prefix' => 'service'], function () {
        Route::post('/add', 'App\Http\Controllers\api\v1\ServiceController@store');
    });
});