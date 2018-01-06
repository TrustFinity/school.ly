<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Student;
use App\Models\Teacher;

class DashboardController extends Controller
{
    public function index()
    {
        if ((Auth::user()->school->preferences === null) || (Auth::user()->school->classGroups->count() === 0)) {
            return view('dashboard.preferences');
        }

        // $teachers =  Teacher::all();
        // $students = Student::all();
        // return view('dashboard.index', compact('teachers', 'students'));
    }
}
