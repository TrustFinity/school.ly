<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;

class DashboardController extends Controller
{
    public function index()
    {
        $teachers =  Teacher::all();
        $students = Student::all();
        return view('dashboard.index', compact('teachers', 'students'));
    }
}
