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
            //statistics
            Route::get('/auth/statistics',   'App\Http\Controllers\api\v1\HomeController@statistics');
        //class
        Route::get('/auth/class', 'App\Http\Controllers\api\v1\ClassesController@allClasses');
        Route::get('/auth/class/{id}', 'App\Http\Controllers\api\v1\ClassesController@classes');
        Route::get('/auth/listClass/{id}', 'App\Http\Controllers\api\v1\ClassesController@listTeacher');
        //teacher
        Route::get('/auth/teacher', 'App\Http\Controllers\api\v1\TeacherController@allTeacher');
        Route::get('/auth/teacher/{id}', 'App\Http\Controllers\api\v1\TeacherController@teacher');
        //rated
        Route::get('/rated/list/{id}', 'App\Http\Controllers\api\v1\RatedController@lissRated');
        //chatbot
        Route::get('/class/chatbot/{id_sub}/{id}', 'App\Http\Controllers\api\v1\ClassesController@getClassLV');
        Route::get('/class/chatbot/all/{level}', 'App\Http\Controllers\api\v1\ClassesController@getLV');
        Route::get('/class/top', 'App\Http\Controllers\api\v1\ClassesController@topClass');
        Route::get('/chatbot/top/teacher', 'App\Http\Controllers\api\v1\ClassesController@topTeacher');
        Route::get('/chatbot/top/subject', 'App\Http\Controllers\api\v1\ClassesController@topSubject');
            //search
            Route::get('/chatbot/teacher/search/{name}', 'App\Http\Controllers\api\v1\TeacherController@searchTeacher');
            Route::get('/chatbot/subject/search/{name}', 'App\Http\Controllers\api\v1\TeacherController@searchSubject');
    });
};

Route::middleware([])->group($publicRoutes);
Route::group(['prefix' => 'v1','middleware' => 'auth:api'],function(){
    //auth
    Route::get('/userprofile/infor', 'App\Http\Controllers\api\v1\AuthController@me');
    Route::get('/userprofile/classes', 'App\Http\Controllers\api\v1\AuthController@userFromClass');
    Route::post('/newRegister', 'App\Http\Controllers\api\v1\AuthController@newRegister');
    Route::post('/updateUser', 'App\Http\Controllers\api\v1\AuthController@updateUser');
    Route::post('/checkPass', 'App\Http\Controllers\api\v1\AuthController@checkPass');
    //exam
    Route::group(['prefix' => 'exams'], function () {
        Route::get('/{id}', 'App\Http\Controllers\api\v1\ExamsController@getTest');
        Route::get('/test/{id}', 'App\Http\Controllers\api\v1\ExamsController@getAns');
        Route::post('/checkans/{id}', 'App\Http\Controllers\api\v1\ExamsController@checkAns');
        Route::get('/userprofile/next_exams', 'App\Http\Controllers\api\v1\ExamsController@nextExams');
        Route::get('/userprofile/done_exams', 'App\Http\Controllers\api\v1\ExamsController@examDone');
    });
    //rated
    Route::group(['prefix' => 'rated'], function () {
        Route::get('/checkValidate/{id}', 'App\Http\Controllers\api\v1\RatedController@isValidUser');
        Route::post('/add', 'App\Http\Controllers\api\v1\RatedController@addRated');
    });
});