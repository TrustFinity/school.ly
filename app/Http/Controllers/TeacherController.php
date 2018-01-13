<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;
use App\Models\Classes\ClassGroup;

class TeacherController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:Admin')->except('create', 'store');
    }

    public function index()
    {
        $teachers = Teacher::paginate(20);
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class_groups = ClassGroup::all();
        $levels = Level::all();
        return view('teachers.create', compact(['class_groups', 'levels']));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(Request $request)
    {
        $teacher = Teacher::create($request->all());
        $teacher->school_id = Auth::user()->school_id;
        $saved = $teacher->save();

        $user  = User::create([
            'name' => $teacher->name,
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'userable_id' => $teacher->id,
            'userable_type' => 'Teacher'
        ]);

        if (!$saved) {
            // Return back with errors.
            return back()->withErrors();
        }
        if (Auth::user() !== null) {
            Auth::login($user);
        }
        return redirect('/teachers');
    }

    /**
     * Display the specified resource.
     *
     * @param Teacher|\App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Teacher|\App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $streams = Stream::all();
        return view('teachers.edit', compact('teacher', 'streams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Teacher|\App\Teacher $teacher
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update(Teacher $teacher)
    {
        $input = request(['name','experience', 'stream_id']);
        $teacher->fill($input)->save();
        return redirect('/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Teacher|\App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('/teachers');
    }
}
