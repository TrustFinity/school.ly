<?php

namespace App\Http\Controllers\Api\v1;

use Auth;
use Carbon\Carbon;
use App\Models\SupportStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendances\SupportStaffAttendance;

class SupportStaffAttendanceApiController extends Controller
{
	/**
	 * Save the attendance data to the database from the 
	 * ajax request.
	 * 
	 * @param  Request $request data from client.
	 * @param  SupportStaff $support_staff to be saved.
	 * @return String           message.
	 */
    public function save(Request $request, SupportStaff $support_staff)
    {
    	$attendance = new SupportStaffAttendance($request->all());
    	$attendance->gender = $support_staff->gender;
    	$attendance->support_staff_id = $support_staff->id;
    	$attendance->school_id = $support_staff->school_id;
    	$attendance->date = Carbon::parse($request->date);
    	if (!$attendance->save()) {
    		return 'Failed';
    	}
        return 'Saved';
    }
}