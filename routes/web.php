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
     * Salary
     */
    Route::get('/teachers/{teacher}/pay-salary', 'TeacherController@paySalaryForm');
    Route::post('/teachers/{teacher}/pay-salary', 'TeacherController@paySalary');

    /**
     * The Student routes
     */
    Route::resource('students', 'StudentController');
    Route::get('/students/{student}/edit-photos', 'StudentController@showPhotoEditForm');
    Route::post('/students/{student}/edit-photos', 'StudentController@editPhoto');
    Route::post('/students/{student}/subjects', 'StudentController@addSubject');
    Route::post('/students/{student}/promote', 'StudentController@promote');

    /**
     * School Fees
     */
    Route::get('/students/{student}/pay-fees', 'StudentController@payFeesForm');
    Route::post('/students/{student}/pay-fees', 'StudentController@payFees');

    /**
     * The ClassGroup routes
     */
    Route::resource('class-groups', 'ClassGroupController');
    Route::get('/class-groups/delete/{class_group}', 'ClassGroupController@destroy');

    /**
     * The Stream routes
     */
    Route::resource('streams', 'StreamController');
    Route::get('/streams/delete/{stream}', 'StreamController@destroy');

    /**
     * The Level route
     */
    Route::resource('levels', 'LevelController');

    /**
     * The Subject routes
     */
    Route::resource('subjects', 'SubjectController');
    Route::get('/subjects/delete/{subject}', 'SubjectController@destroy');

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
    Route::post('/support-staff/{support_staff}/pay-salary', 'SupportStaffController@paySalary');

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
    ], function () {
        Route::get('students', 'StudentReportController@index');
        Route::get('teachers', 'TeacherReportController@index');
        Route::get('support-staff', 'SupportStaffReportController@index');
    });

    /*
    * Examinations
    */
    Route::resource('/examinations', 'ExaminationsController');
    Route::post('/examinations/{examination}/save-results', 'ExaminationsController@saveResults');

    // Route::resource('/results', 'ResultsController');
});
