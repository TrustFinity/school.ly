<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Classroom;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    
     public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
    }

    
    public function index()
    {
        $students = Student::paginate(20);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $levels = Level::all();
        return view('students.create', compact('classrooms', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store()
    {
        Student::create(request(['name','gender', 'age', 'address', 'classroom_id', 'level_id']));
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param Student|\App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student|\App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        $levels = Level::all();
        return view('students.edit', compact('classrooms', 'levels', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Student|\App\Student $student
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update(Student $student)
    {
        $input = request(['name','gender', 'age', 'address', 'classroom_id', 'level_id']);
        $student->fill($input)->save();
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student|\App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/students');
    }
}
