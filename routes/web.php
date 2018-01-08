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
    return view('welcome');
});

Auth::routes();

Route::group([
    'middleware' => ['auth', 'web']
], function () {
    // Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/settings', 'SettingController@create');
    Route::put('/settings/{setting}', 'SettingController@update');

    Route::resource('/admin', 'AdminController');

    /**
     * The Teacher routes
     */
    Route::resource('teachers', 'TeacherController');

    Route::get('/teacherpage', 'TeacherPageController@index');
    Route::get('/teacherpage/edit/{teacher}', 'TeacherPageController@edit');
    Route::post('/teacherpage/{teacher}', 'TeacherPageController@update');

    /**
     * The Student routes
     */
    Route::resource('students', 'StudentController');

    Route::get('/studentpage', 'StudentPageController@index');
    Route::get('/studentpage/edit/{student}', 'StudentPageController@edit');
    Route::post('/studentpage/{student}', 'StudentPageController@update');

    /**
     * The Classgroup routes
     */
    Route::get('/classgroups/create', 'ClassgroupController@create');
    Route::get('/classgroups', 'ClassgroupController@index');
    Route::post('/classgroups', 'ClassgroupController@store');
    Route::get('/classgroups/{classgroup}', 'ClassgroupController@show');
    Route::get('/classgroups/edit/{classgroup}', 'ClassgroupController@edit');
    Route::post('/classgroups/{classgroup}', 'ClassgroupController@update');
    Route::get('/classgroups/delete/{classgroup}', 'ClassgroupController@destroy');



    /**
     * The Classroom routes
     */
    Route::get('/classrooms/create', 'ClassroomController@create');
    Route::get('/classrooms', 'ClassroomController@index');
    Route::post('/classrooms', 'ClassroomController@store');
    Route::get('/classrooms/{classroom}', 'ClassroomController@show');
    Route::get('/classrooms/edit/{classroom}', 'ClassroomController@edit');
    Route::post('/classrooms/{classroom}', 'ClassroomController@update');
    Route::get('/classrooms/delete/{classroom}', 'ClassroomController@destroy');

    /**
     * The Level routes
     */
    Route::resource('levels', 'LevelController');

    /**
     * The Subject routes
     */
    Route::get('/subjects/create', 'SubjectController@create');
    Route::get('/subjects', 'SubjectController@index');
    Route::post('/subjects', 'SubjectController@store');
    Route::get('/subjects/{subject}', 'SubjectController@show');
    Route::get('/subjects/edit/{subject}', 'SubjectController@edit');
    Route::post('/subjects/{subject}', 'SubjectController@update');
    Route::get('/subjects/delete/{subject}', 'SubjectController@destroy');
});
