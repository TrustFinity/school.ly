<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentPageController extends Controller
{
    //

    public function __construct()
    {

           $this->middleware('role:Student');              
        
    }


    public function index() {


        $student = Student::find(Auth::user()->userable_id);

        return view('pages.studentpage.index', compact('student'));
    }


    public function edit(Student $student)
    {


        return view('pages.studentpage.edit', compact('student'));
    }


     public function update(Student $student)
    {

        //dd(request()->all());
    	
        $input = request(['name','gender', 'experience', 'phone']);

        $student->fill($input)->save();

        return redirect('/studentpage');
        
    }
}
