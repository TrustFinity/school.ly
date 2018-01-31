<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reports\SupportStaffReport;

class SupportStaffReportController extends Controller
{
    public function index(Request $request)
    {
        $joining_start_date = $request->starting_date ?? null;
        $joining_stop_date  = $request->closing_date ?? null;
        $support_staff = (new SupportStaffReport($joining_start_date, $joining_stop_date))->generateReport();
        return view('reports.support-staff.index', compact('support_staff',
            'joining_start_date',
            'joining_stop_date'));
    }
}
