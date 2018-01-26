<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([
    'middleware' => ['auth', 'web']
], function () {
    /**
     * Dashboard
     */
    Route::get('/dashboard', 'DashboardController@index');

    /**
     * Settings
     */
    Route::get('/settings', 'SettingController@create');
    Route::put('/settings/{setting}', 'SettingController@update');

    /**
     * Admins
     */
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

    /**
     * Attendance
     */
    Route::get('/attendances', 'AttendanceController@index');
    Route::get('/attendances/teachers', 'TeachersAttendanceController@index');
    Route::get('/attendances/support-staffs', 'SupportStaffAttendanceController@index');

    /**
     * Support Staffs
     */
    Route::resource('/support-staffs', 'SupportStaffController');

    /**
     * Chart of accounts
     */
    Route::resource('/chart-of-accounts', 'GeneralLedgerAccountsController');
    Route::get('/chart-of-accounts/{general_ledger_accounts}/add', 'GeneralLedgerAccountsController@addNewAccount');
    Route::post('/chart-of-accounts/{general_ledger_accounts}/save', 'GeneralLedgerAccountsController@saveNewAccount');
    
});
