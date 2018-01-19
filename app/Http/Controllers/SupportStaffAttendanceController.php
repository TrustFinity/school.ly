<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportStaff;
use App\Models\Attendances\SupportStaffAttendance;

class SupportStaffAttendanceController extends Controller
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
        $support_staffs = SupportStaff::all();
        return view('attendance.supportstaffs.index', compact('support_staffs'));
    }
}
