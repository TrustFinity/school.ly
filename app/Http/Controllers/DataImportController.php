<?php

namespace App\Http\Controllers;

use Excel;
use Auth;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;

class DataImportController extends Controller
{
    const STUDENT_FIELDS = [
        'stream_id',
        'level_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'address',
        'parents_names',
        'parents_phone_number',
        'joining_year',
        'leaving_year',
    ];

    /**
     * Display a listing of available import options.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('imports.index');
    }

    public function students()
    {
        $streams = Stream::all();
        $levels = Level::all();
        return view('imports.students.import-students', compact('streams', 'levels'));
    }

    /**
     * Download Student template for import
     */
    public function studentTemplate(Request $request)
    {
        return Excel::create('students_template', function ($excel) {
            $excel->sheet('students', function ($sheet) {
                $sheet->fromArray(self::STUDENT_FIELDS);
            });
        })->download('xls');
    }

    /**
     * Process student data from excel file
     */
    public function importStudents(Request $request)
    {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();

            //todo pius
            // 1. check for duplicates
            // 2. add checks for level_id and and stream_id

            if (!empty($data) && $data->count()) {
                foreach ($data->toArray() as $student) {
                    if (!empty($student)) {
                        $student            =  new Student($student);
                        $student->school_id = Auth::user()->school_id;
                        $student->save();
                    }
                }
                return back()->with('success', $data->count().' students Imported successfully.');
            } else {
                return back()->with('danger', 'Imported file is empty. No students imported.');
            }
        }

        return back()->with('error', 'Please Check your file for errors and resubmit after fixing errors.');
    }
}
