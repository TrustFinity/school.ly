<?php

namespace App\Http\Controllers\Api\v1;

use Auth;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendances\Attendance;

class StudentAttendanceApiController extends Controller
{
	/**
	 * Save the attendance data to the database from the 
	 * ajax request.
	 * 
	 * @param  Request $request data from client.
	 * @param  Student $student to be saved.
	 * @return String           message.
	 */
    public function save(Request $request, Student $student)
    {
    	$attendance = new Attendance($request->all());
    	$attendance->gender = $student->gender;
    	$attendance->stream_id = $student->stream_id;
    	$attendance->student_id = $student->id;
    	$attendance->school_id = $student->school_id;
    	$attendance->date = Carbon::parse($request->date);
    	if (!$attendance->save()) {
    		return 'Failed';
    	}
        return 'Saved';
    }
}