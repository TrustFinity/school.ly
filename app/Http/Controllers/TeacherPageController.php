<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Teacher;

class TeacherPageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'entrust']);
    }

    public function index()
    {
        $teacher = Teacher::find(Auth::user()->userable_id);
        return view('pages.teacherpage.index', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('pages.teacherpage.edit', compact('teacher'));
    }

    public function update(Teacher $teacher)
    {
        $input = request(['name','gender', 'experience', 'phone']);
        $teacher->fill($input)->save();

        return redirect('/teacherpage');
    }
}
