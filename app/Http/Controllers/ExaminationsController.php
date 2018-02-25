<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Result;
use App\Models\Examination;
use App\Models\Classes\Stream;
use App\Models\Classes\Subject;
use App\Models\Classes\ClassGroup;
use App\Http\Requests\StoreExaminationRequest;
use App\Http\Requests\StoreExaminationResults;

class ExaminationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = Examination::all();
        return view('examinations.index', compact('examinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examination = new Examination;
        return view('examinations.create', compact('examination'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExaminationRequest $request)
    {
        $new_examination = new Examination($request->all());
        $new_examination->school_id = Auth::user()->school_id;

        if ($new_examination->save()) {
            flash('New Examination record successfully added.')->success();
            return redirect('/examinations');
        } else {
            flash('Failed.')->error();
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examination = Examination::find($id);
        $results = Result::where('examination_id', $id)->get();
        return view('examinations.show', compact('examination', 'results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class_groups = ClassGroup::with('streams', 'subjects', 'streams.students')->get();
        $examination = Examination::find($id);
        return view('examinations.new', compact('class_groups', 'examination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExaminationResults $request, $id)
    {
        $examination = Examination::find($id);
        $subject = Subject::find($request->subject_id);
        $students = Stream::find($request->stream_id)->students;

        foreach ($students as $student) {
            $result = new Result;
            $result->school_id = $examination->school_id;
            $result->examination_id = $id;
            $result->subject_id = $request->subject_id;
            $result->class_group_id = $subject->class_group_id;

            $result->student_id = $student->id;
            $result->marks = $request->input("student-$student->id");

            $result->save();
        }

        flash("Results for $subject->name have been saved.")->success();
        return redirect('/examinations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examination = Examination::findOrFail($id);

        if ($examination->results()->count() > 0) {
            flash("You cannot delete this $examination->name because it has results attached to it.")->error();
            return redirect("/examinations/$id");
        }

        $examination->delete();

        flash('Record has been successfully deleted.')->success();
        return redirect('/examinations');
    }
}
