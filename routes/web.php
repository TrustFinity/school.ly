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
     * Users
     */
    Route::resource('users', 'UserController');

    /**
     * Roles
     */
    Route::get('/roles', 'RoleController@index');

    /**
     * Admins
     */
    Route::resource('/admin', 'AdminController');

    /**
     * The Teacher routes
     */
    Route::resource('teachers', 'TeacherController');
    Route::get('/teachers/{teacher}/edit-photos', 'TeacherController@showPhotoEditForm');
    Route::post('/teachers/{teacher}/edit-photos', 'TeacherController@editPhoto');

    /**
     * The Student routes
     */
    Route::resource('students', 'StudentController');
    Route::get('/students/{student}/edit-photos', 'StudentController@showPhotoEditForm');
    Route::post('/students/{student}/edit-photos', 'StudentController@editPhoto');

    /**
     * The ClassGroup routes
     */
    Route::resource('class-groups', 'ClassGroupController');
    Route::get('/class-groups/delete/{class_group}', 'ClassGroupController@destroy');

    // Route::get('/class-groups/create', 'ClassGroupController@create');
    // Route::get('/class-groups', 'ClassGroupController@index');
    // Route::post('/class-groups', 'ClassGroupController@store');
    // Route::get('/class-groups/{class_group}', 'ClassGroupController@show');
    // Route::get('/class-groups/edit/{class_group}', 'ClassGroupController@edit');
    // Route::post('/class-groups/{class_group}', 'ClassGroupController@update');

    /**
     * The Stream routes
     */
    Route::resource('streams', 'StreamController');
    Route::get('/streams/delete/{stream}', 'StreamController@destroy');

    // Route::get('/streams/create', 'StreamController@create');
    // Route::get('/streams', 'StreamController@index');
    // Route::post('/streams', 'StreamController@store');
    // Route::get('/streams/{stream}', 'StreamController@show');
    // Route::get('/streams/edit/{stream}', 'StreamController@edit');
    // Route::post('/streams/{stream}', 'StreamController@update');

    /**
     * The Level route
     */
    Route::resource('levels', 'LevelController');

    /**
     * The Subject routes
     */
    Route::resource('subjects', 'SubjectController');
    Route::get('/subjects/delete/{subject}', 'SubjectController@destroy');
    
    // Route::get('/subjects/create', 'SubjectController@create');
    // Route::get('/subjects', 'SubjectController@index');
    // Route::post('/subjects', 'SubjectController@store');
    // Route::get('/subjects/{subject}', 'SubjectController@show');
    // Route::get('/subjects/edit/{subject}', 'SubjectController@edit');
    // Route::post('/subjects/{subject}', 'SubjectController@update');

    /**
     * Attendance
     */
    Route::get('/attendances', 'AttendanceController@index');
    Route::get('/attendances/teachers/{teacher}', 'TeachersAttendanceController@index');
    Route::get('/attendances/support-staffs/{support_staff}', 'SupportStaffAttendanceController@index');

    /**
     * Support Staffs
     */
    Route::resource('/support-staff', 'SupportStaffController');
    Route::get('/support-staff/{support_staff}/edit-photos', 'SupportStaffController@showPhotoEditForm');
    Route::post('/support-staff/{support_staff}/edit-photos', 'SupportStaffController@editPhoto');

    /**
     * Chart of accounts
     */
    Route::resource('/chart-of-accounts', 'GeneralLedgerAccountsController');
    Route::get('/chart-of-accounts/{general_ledger_accounts}/add', 'GeneralLedgerAccountsController@addNewAccount');
    Route::post('/chart-of-accounts/{general_ledger_accounts}/save', 'GeneralLedgerAccountsController@saveNewAccount');

    /**
     * Transactions
     */
    Route::group([
        'prefix' => 'transactions',
        'namespace' => 'Transactions'
    ], function () {
        Route::resource('salaries', 'SalaryController');
        Route::resource('expenses', 'ExpenseController');
        Route::resource('school-fees', 'SchoolFeeController');
    });

    /**
     * Reports
     */
    Route::group([
        'prefix' => 'reports',
        'namespace' => 'Reports'
    ], function (){
        Route::get('students', 'StudentReportController@index');
        Route::get('teachers', 'TeacherReportController@index');
        Route::get('support-staff', 'SupportStaffReportController@index');
    });
});
