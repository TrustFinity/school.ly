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
    Route::get('/teachers/create', 'TeacherController@create');
    Route::get('/teachers', 'TeacherController@index');
    Route::post('/teachers', 'TeacherController@store');
    Route::get('/teachers/{teacher}', 'TeacherController@show');
    Route::get('/teachers/edit/{teacher}', 'TeacherController@edit');
    Route::post('/teachers/{teacher}', 'TeacherController@update');
    Route::get('/teachers/delete/{teacher}', 'TeacherController@destroy');

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
     * The ClassGroup routes
     */
    Route::get('/class-groups/create', 'ClassGroupController@create');
    Route::get('/class-groups', 'ClassGroupController@index');
    Route::post('/class-groups', 'ClassGroupController@store');
    Route::get('/class-groups/{class_group}', 'ClassGroupController@show');
    Route::get('/class-groups/edit/{class_group}', 'ClassGroupController@edit');
    Route::post('/class-groups/{class_group}', 'ClassGroupController@update');
    Route::get('/class-groups/delete/{class_group}', 'ClassGroupController@destroy');



    /**
     * The Stream routes
     */
    Route::get('/streams/create', 'StreamController@create');
    Route::get('/streams', 'StreamController@index');
    Route::post('/streams', 'StreamController@store');
    Route::get('/streams/{stream}', 'StreamController@show');
    Route::get('/streams/edit/{stream}', 'StreamController@edit');
    Route::post('/streams/{stream}', 'StreamController@update');
    Route::get('/streams/delete/{stream}', 'StreamController@destroy');

    /**
     * The Level routes
     */
    Route::get('/levels/create', 'LevelController@create');
    Route::get('/levels', 'LevelController@index');
    Route::post('/levels', 'LevelController@store');
    Route::get('/levels/{level}', 'LevelController@show');
    Route::get('/levels/edit/{level}', 'LevelController@edit');
    Route::post('/levels/{level}', 'LevelController@update');
    Route::get('/levels/delete/{level}', 'LevelController@destroy');

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
