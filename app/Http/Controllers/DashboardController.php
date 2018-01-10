<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Student;
use App\Models\Teacher;

class DashboardController extends Controller
{
    public function index()
    {
        //todo pius: work on this
        // if ((Auth::user()->school->preferences === null) || (Auth::user()->school->classGroups->count() === 0)) {
        //     return view('dashboard.setup');
        // }

        $teachers =  Teacher::all();
        $students = Student::all();
        return view('dashboard.index', compact('teachers', 'students'));
    }
}
