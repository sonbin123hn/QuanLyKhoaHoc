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
        //class
        Route::get('/auth/class', 'App\Http\Controllers\api\v1\ClassesController@allClasses');
        Route::get('/auth/class/{id}', 'App\Http\Controllers\api\v1\ClassesController@classes');
        Route::get('/auth/listClass/{id}', 'App\Http\Controllers\api\v1\ClassesController@listTeacher');
        //teacher
        Route::get('/auth/teacher', 'App\Http\Controllers\api\v1\TeacherController@allTeacher');
        Route::get('/auth/teacher/{id}', 'App\Http\Controllers\api\v1\TeacherController@teacher');
    });
};

Route::middleware([])->group($publicRoutes);
Route::group(['prefix' => 'v1','middleware' => 'auth:api'],function(){
    //auth
    Route::post('/newRegister', 'App\Http\Controllers\api\v1\AuthController@newRegister');
    Route::post('/updateUser', 'App\Http\Controllers\api\v1\AuthController@updateUser');
    Route::post('/checkPass', 'App\Http\Controllers\api\v1\AuthController@checkPass');

    Route::group(['prefix' => 'rated'], function () {
        Route::get('/checkValidate/{id}', 'App\Http\Controllers\api\v1\RatedController@isValidUser');
        Route::post('/add', 'App\Http\Controllers\api\v1\RatedController@addRated');
        Route::get('/list/{id}', 'App\Http\Controllers\api\v1\RatedController@lissRated');
    });
});