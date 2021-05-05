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

Auth::routes();
Route::get('/mail', 'App\Http\Controllers\Admin\MailController@mail')->name('admin.login');
Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('admin.login');
Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Auth'
], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout')->name('admin.logout');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => ['admin']
], function () {
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    //profile
    Route::get('/user/profile','UserController@edit')->name('admin.profile');
    Route::post('/user/profile','UserController@update')->name('admin.profile');
    //browsings
    Route::get('/browsing-account','BrowsingAccountController@index')->name('admin.browsings');
    Route::get('/browsing-account/add/{id}','BrowsingAccountController@show')->name('admin.browsings.store');
    Route::get('/browsing-account/remove/{id}','BrowsingAccountController@delete')->name('admin.browsings.remove');
    Route::get('/browsing-account/update/{id}','BrowsingAccountController@edit')->name('admin.browsings.edit');
    Route::post('/browsing-account/update/{id}','BrowsingAccountController@update')->name('admin.browsings.update');
    Route::get('/browsing-account/addAdmin','BrowsingAccountController@create')->name('admin.browsings.addAdmin');
    Route::post('/browsing-account/addAdmin','BrowsingAccountController@store');
    //course
    Route::get('/course','CourseController@index')->name('admin.course');
    Route::get('/course/add','CourseController@create')->name('admin.course.create');
    Route::post('/course/add','CourseController@store')->name('admin.course.store');
    Route::get('/course/update/{id}','CourseController@edit')->name('admin.course.edit');
    Route::post('/course/update/{id}','CourseController@update')->name('admin.course.update');
    //teacher
    Route::get('/teacher','TeacherController@index')->name('admin.teacher');
    Route::get('/teacher/add','TeacherController@create')->name('admin.teacher.create');
    Route::post('/teacher/add','TeacherController@store')->name('admin.teacher.store');
    Route::get('/teacher/update/{id}','TeacherController@edit')->name('admin.teacher.edit');
    Route::post('/teacher/update/{id}','TeacherController@update')->name('admin.teacher.update');
    Route::get('/teacher/lock/{id}','TeacherController@lock')->name('admin.teacher.lock');
    //subject
    Route::get('/subject','SubjectController@index')->name('admin.subject');
    Route::get('/subject/add','SubjectController@create')->name('admin.subject.create');
    Route::post('/subject/add','SubjectController@store')->name('admin.subject.store');
    Route::get('/subject/update/{id}','SubjectController@edit')->name('admin.subject.edit');
    Route::post('/subject/update/{id}','SubjectController@update')->name('admin.subject.update');
    Route::get('/subject/lock/{id}','SubjectController@lock')->name('admin.subject.lock');
    //classes
    Route::get('/classes','ClassesController@index')->name('admin.classes');
    Route::get('/classes/add','ClassesController@create')->name('admin.classes.create');
    Route::post('/classes/add','ClassesController@store')->name('admin.classes.store');
    Route::get('/classes/update/{id}','ClassesController@edit')->name('admin.classes.edit');
    Route::post('/classes/update/{id}','ClassesController@update')->name('admin.classes.update');
    //Question
    Route::get('/question','QuestionController@index')->name('admin.question');
    Route::get('/question/add','QuestionController@create')->name('admin.question.create');
    Route::post('/question/add','QuestionController@store')->name('admin.question.store');
    Route::get('/question/update/{id}','QuestionController@edit')->name('admin.question.edit');
    Route::post('/question/update/{id}','QuestionController@update')->name('admin.question.update');
        //ajax
        Route::post('/question/ajax','QuestionController@ajaxShow');
    //exams
    Route::get('/exams','ExamsController@index')->name('admin.exams');
        Route::get('/exams/abc','ExamsController@abc');
    Route::get('/exams/add','ExamsController@create')->name('admin.exams.create');
    Route::post('/exams/add','ExamsController@store')->name('admin.exams.store');
    Route::get('/exams/update/{id}','ExamsController@edit')->name('admin.exams.edit');
    Route::post('/exams/update/{id}','ExamsController@update')->name('admin.exams.update');
    //scores
    Route::get('/scores','ScoresController@index')->name('admin.scores');
    Route::get('/scores/add','ScoresController@create')->name('admin.scores.create');
    Route::post('/scores/add','ScoresController@store')->name('admin.scores.store');
    Route::get('/scores/update/{id}','ScoresController@edit')->name('admin.scores.edit');
    Route::post('/scores/update/{id}','ScoresController@update')->name('admin.scores.update');
    //statistical
    Route::get('/statistical','StatisticalController@index')->name('admin.statistical');
    Route::get('/statistical/add','StatisticalController@create')->name('admin.statistical.create');
    Route::post('/statistical/add','StatisticalController@store')->name('admin.statistical.store');
    Route::get('/statistical/update/{id}','StatisticalController@edit')->name('admin.statistical.edit');
    Route::post('/statistical/update/{id}','StatisticalController0@update')->name('admin.statistical.update');


});