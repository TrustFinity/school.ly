<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Level;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin')->except('create', 'store');
    }

    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
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

        return view('teachers.create', compact(['classrooms', 'levels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $teacher = Teacher::create(request(['name','gender', 'classroom_id', 'level_id', 'experience', 'phone']));

        User::create([
            'name' => $teacher->name,
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'userable_id' => $teacher->id,
            'userable_type' => 'Teacher'
        ]);


        if (Auth::check() && Auth::user()->hasRole('Admin')) {
            return redirect('/teachers');
        }

        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $classrooms = Classroom::all();
        return view('teachers.edit', compact('teacher', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Teacher $teacher)
    {
        $input = request(['name','experience', 'classroom_id']);
        $teacher->fill($input)->save();

        return redirect('/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('/teachers');
    }
}
