<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;
use App\Http\Requests\StoreStudent;
use App\Http\Requests\StoreProfilePhoto;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'entrust']);
    }

    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(20);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $streams = Stream::all();
        $levels = Level::all();
        $student = new Student();
        return view('students.create', compact('streams', 'levels', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(StoreStudent $request)
    {
        $student = new Student($request->all());
        $student->school_id = Auth::user()->school_id;
        $student->search_term = $student->constructSearchTerm();

        if($request->hasFile('photo_url')){
            $image_name = str_slug($student->name).time().".jpg";
            $image = $request->file('photo_url');
            $destination_path = public_path('/storage/photos');
            $image->move($destination_path, $image_name);
            $student->photo_url = '/storage/photos/'.$image_name;
        }

        if (!$student->save()) {
            flash('Failed to create '.$student->name)->errors();
            return back();
        }
        return redirect('/students/'.$student->id);
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
        $streams = Stream::all();
        $levels = Level::all();
        return view('students.edit', compact('streams', 'levels', 'student'));
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
        $student->fill(request()->all())->save();
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

    public function showPhotoEditForm(Request $request, Student $student)
    {
        $resource = $student;
        $resource_type = 'students';
        return view('shared.edit_photos', compact('resource', 'resource_type'));
    }

    public function editPhoto(StoreProfilePhoto $request, Student $student)
    {
        $image_name = $student->photo_url ?? str_slug($student->name).time().".jpg";
        $image = $request->file('photo_url');
        $destination_path = public_path('/storage/photos');
        $image->move($destination_path, $image_name);
        $student->photo_url = $student->photo_url ?? '/storage/photos/'.$image_name;
        $student->save();

        flash('Updated '.$student->name.' photo.')->success();
        return redirect('/students/'.$student->id);
    }
}
