<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Attendances\TeachersAttendance;

class TeachersAttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'entrust']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('attendance.teachers.index', compact('teachers'));
    }
}
