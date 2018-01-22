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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api\v1')->group(function () {
	// Teaching tools
    Route::get('/v1/teachers-kanban/{teacher}', 'KanbanApiController@loadForTeacher');

    //Search
    Route::post('/v1/search/students', 'StudentApiController@search');
    Route::post('/v1/search/teachers', 'TeacherApiController@search');
    Route::post('/v1/search/support-staffs', 'SupportStaffApiController@search');

    // Attendances
    Route::get('/v1/attendances/save/{student}', 'StudentAttendanceApiController@save');
    Route::get('/v1/attendances/teachers/save/{teacher}', 'TeacherAttendanceApiController@save');
    Route::get('/v1/attendances/support-staffs/save/{support_staff}', 'SupportStaffAttendanceApiController@save');
});
