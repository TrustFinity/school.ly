<?php

namespace App\Http\Controllers\Api\v1;

use Auth;
use Carbon\Carbon;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendances\TeachersAttendance;

class TeacherAttendanceApiController extends Controller
{
	/**
	 * Save the attendance data to the database from the 
	 * ajax request.
	 * 
	 * @param  Request $request data from client.
	 * @param  Teacher $teacher to be saved.
	 * @return String           message.
	 */
    public function save(Request $request, Teacher $teacher)
    {
    	$attendance = new TeachersAttendance($request->all());
    	$attendance->gender = $teacher->gender;
    	$attendance->teacher_id = $teacher->id;
    	$attendance->school_id = $teacher->school_id;
    	$attendance->date = Carbon::parse($request->date);
    	if (!$attendance->save()) {
    		return 'Failed';
    	}
        return 'Saved';
    }
}