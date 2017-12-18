<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Classroom;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin')->except('create', 'store');
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
    public function store(Request $request)
    {
        $student = Student::create($request->all());

        //todo decide weather students need to use the same login or a unique one
        User::create([
            'name' => $student->name,
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'userable_id' => $student->id,
            'userable_type' => 'Student'
        ]);

        if (Auth::check() && Auth::user()->hasRole('Admin')) {
            return redirect('/students');
        }

        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param Student|\App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
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
