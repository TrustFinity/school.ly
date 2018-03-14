<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;
use App\Http\Requests\StoreStudent;
use App\Models\Transactions\SchoolFee;
use App\Http\Requests\StoreProfilePhoto;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;

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
        
        if (!$request->joining_year) {
            $student->joining_year = Carbon::now();
        }

        if ($request->hasFile('photo_url')) {
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
        $student->load('subjects');
        $all_subjects = $student->level->subjects;
        $all_streams  = Stream::whereNotIn('id', [$student->stream->id])->get();
        return view('students.show', compact('student', 'all_subjects', 'all_streams'));
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

    public function payFeesForm(Student $student)
    {
        $payment_methods = SchoolFee::PAYMENT_METHODS;
        $assets = GeneralLedgerAccounts::assets();
        $equity = GeneralLedgerAccounts::equity();
        return view('students.payments.fees-tuition', compact(
            'student',
            'payment_methods',
            'assets',
            'equity'
        ));
    }

    public function payFees(Request $request, Student $student)
    {
        $source = GeneralLedgerAccounts::find($request->source_asset_account_id);

        if ($source->balance < $request->amount) {
            flash($source->name.' doesnt have enough balance to complete the transaction')->error();
            return back();
        }
        $school_fee = new SchoolFee($request->all());
        $school_fee->school_id = Auth::user()->school_id;
        $school_fee->student_id = $student->id;
        $school_fee->stream = $student->stream->name;

        if (!$school_fee->saveTransaction()) {
            flash("Failed to save the school fees record")->error()->important();
            return back();
        }

        $school_fee->asset_gla->decreaseBalance($school_fee->amount);
        $school_fee->equity_gla->increaseBalance($school_fee->amount);

        flash("Payment for {$school_fee->year->year} term {$school_fee->term} was saved successfully")->success();

        return redirect('/students/'.$student->id);
    }

    public function addSubject(Request $request, Student $student)
    {
        $student->subjects()->syncWithOutDetaching($request->subject_id);
        flash('Subject added successfully')->success();
        return back();
    }

    public function promote(Request $request, Student $student)
    {
        $stream = $student->stream;
        $student->stream_id = $request->stream_id;
        if (!$student->save()) {
            flash("Failed to promote ".$student->first_name.". Try again later.")->error();
            return back();
        }
        flash("Promoted ".$student->first_name." successfully.")->success();
        return back();
    }
}
