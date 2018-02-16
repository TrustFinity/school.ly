<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
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
	 * @return String           message.
	 */
    public function save(Request $request)
    {
    	$attendance = new Attendance($request->all());
    	$attendance->date = Carbon::parse($request->date);

        $exists = Attendance::where('date', $attendance->date)
                            ->where('stream_id', $attendance->stream_id)
                            ->first();

        if ($exists) {
            return $attendance->stream->name.
                " attendance aready recorded for ".$attendance->date->toDateString();
        }

    	if (!$attendance->save()) {
    		return 'Failed to record attendance for '
                .$attendance->stream->name." for date ".$attendance->date->toDateString();
    	}

        return $attendance->stream->name." attendance recorded for "
            .$attendance->date->toDateString()." successfully.";
    }
}