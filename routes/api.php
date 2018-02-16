<?php

Route::namespace('Api\v1')->group(function () {
	// Teaching tools
    Route::get('/v1/teachers-kanban/{teacher}', 'KanbanApiController@loadForTeacher');

    //Search
    Route::post('/v1/search/students', 'StudentApiController@search');
    Route::post('/v1/search/teachers', 'TeacherApiController@search');
    Route::post('/v1/search/support-staffs', 'SupportStaffApiController@search');

    // Attendances
    Route::get('/v1/attendances/save', 'StudentAttendanceApiController@save');
    Route::get('/v1/attendances/teachers/save', 'TeacherAttendanceApiController@save');
    Route::get('/v1/attendances/support-staffs/save', 'SupportStaffAttendanceApiController@save');
});
