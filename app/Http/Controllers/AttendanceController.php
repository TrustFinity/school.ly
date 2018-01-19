<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes\Stream;
use App\Models\Attendances\Attendance;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streams = Stream::with(['students'])->get();
        return view('attendance.students.index', compact('streams'));
    }
}
