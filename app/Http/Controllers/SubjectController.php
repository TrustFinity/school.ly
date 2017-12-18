<?php

namespace App\Http\Controllers;

use Auth;
use App\School;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $teachers = Teacher::all();
        return view('subjects.create', compact('levels', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store()
    {
        Subject::create(request(['name','level_id','teacher_id']));
        return redirect('/subjects');
    }

    /**
     * Display the specified resource.
     *
     * @param Subject|\App\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        // No need for the show page.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subject|\App\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Subject|\App\Subject $subject
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update(Subject $subject)
    {
        $input = request(['name','level_id','teacher_id']);
        $subject->fill($input);
        // $subject->school_id = Auth::user()->school_id;
        $subject->school_id = School::first()->id;
        $subject->save();
        return redirect('/subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject|\App\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect('/subjects');
    }
}
