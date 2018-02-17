<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reports\TeacherReport;

class TeacherReportController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth', 'entrust']);
    }
    
    public function index(Request $request)
    {
        $joining_start_date = $request->starting_date ?? null;
        $joining_stop_date  = $request->closing_date ?? null;
        $teachers = (new TeacherReport($joining_start_date, $joining_stop_date))->generateReport();
        return view('reports.teachers.index', compact('teachers',
            'joining_start_date',
            'joining_stop_date'));
    }
}
