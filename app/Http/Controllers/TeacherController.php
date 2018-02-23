<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;
use App\Models\Classes\ClassGroup;
use App\Http\Requests\StoreTeacher;
use App\Http\Requests\StoreProfilePhoto;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'entrust']);
    }

    public function index()
    {
        $teachers = Teacher::orderBy('id', 'desc')->paginate(20);
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
    public function store(StoreTeacher $request)
    {
        $teacher = new Teacher($request->all());
        $teacher->school_id = Auth::user()->school_id;
        $teacher->search_term = $teacher->constructSearchTerm();

        if (!$teacher->save()) {
            flash('Failed to create new teacher.')->error();
            return back();
        }

        flash('New teacher '.$teacher->name.' created successfully.')->success();
        return redirect('/teachers/'.$teacher->id);
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

    public function showPhotoEditForm(Request $request, Teacher $teacher)
    {
        $resource = $teacher;
        $resource_type = 'teachers';
        return view('shared.edit_photos', compact('resource', 'resource_type'));
    }

    public function editPhoto(StoreProfilePhoto $request, Teacher $teacher)
    {
        $image_name = $teacher->photo_url ?? str_slug($teacher->name).time().".jpg";
        $image = $request->file('photo_url');
        $destination_path = public_path('/storage/photos');
        $image->move($destination_path, $image_name);
        $teacher->photo_url = $teacher->photo_url ?? '/storage/photos/'.$image_name;
        $teacher->save();

        flash('Updated '.$teacher->name.' photo.')->success();
        return redirect('/teachers/'.$teacher->id);
    }
}
