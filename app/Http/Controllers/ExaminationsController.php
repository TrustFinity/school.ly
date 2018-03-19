<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classes\Stream;
use App\Models\Classes\Subject;
use App\Models\Examinations\Term;
use App\Models\Classes\ClassGroup;
use App\Models\Examinations\Result;
use App\Models\Examinations\Examination;
use App\Http\Requests\StoreExaminationRequest;

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
        $terms = Term::all();
        return view('examinations.create', compact('examination', 'terms'));
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
    public function show(Examination $examination)
    {
        $results = Result::where('examination_id', $id)->get();
        $streams = Stream::with('students', 'classGroup.subjects')->get();
        return view('examinations.show', compact('examination', 'results', 'streams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Examination $examination)
    {
        $terms = Term::all();
        return view('examinations.edit', compact('examination', 'terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExaminationRequest $request, Examination $examination)
    {
        if (!$examination->update($request->all())) {
            flash("Failed to update ".$examination->name.". Trt again later.")->error();
        }
        flash("Examination data updated successfully")->success();
        return redirect('/examinations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examination $examination)
    {
        if ($examination->results()->count() > 0) {
            flash("You cannot delete this $examination->name because it has results attached to it.")->error();
            return redirect("/examinations/$id");
        }
        $examination->delete();
        flash('Examination has been successfully deleted.')->success();
        return redirect('/examinations');
    }

    public function viewResults(Request $request, Student $student, Examination $examination)
    {
        return view('examinations.results.view', compact('examination', 'student'));
    }

    public function enterResults(Request $request, Student $student, Examination $examination)
    {
        return view('examinations.results.enter', compact('examination', 'student'));   
    }

    public function saveResults(Request $request, Student $student, Examination $examination)
    {
        $isSuccessful = true;
        
        foreach ($student->subjects as $subject) {
            $result = Result::where('examination_id', $examination->id)
                         ->where('subject_id', $subject->id)
                         ->where('student_id', $student->id)
                         ->first();
            if (isset($request->{$subject->name}['marks'])) {
                if (!$result) {
                    $result = new Result;
                }
                $result->school_id      = Auth::user()->school_id;
                $result->examination_id = $examination->id;
                $result->subject_id     = $subject->id;
                $result->student_id     = $student->id;
                $result->class_group_id = $student->stream->classGroup->id;
                $result->marks          = $request->{$subject->name}['marks'];

                if (!$result->save()) {
                    $isSuccessful = false;
                }
            }
        }

        if (!$isSuccessful) {
            flash("Failed to save some marks for some subjects. Please try again.")->error();
            return back();
        }

        flash('Successfully updated the marks.')->success();
        return redirect("/students/".$student->id."/examination/".$examination->id."/view-result");
    }
}
