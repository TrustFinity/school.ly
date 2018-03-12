<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;

class DataImportController extends Controller
{
    const STUDENT_FIELDS = [
        // 'school_id', gotten from the auth user
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
            $excel->sheet('sampleSheet', function ($sheet) {
                $sheet->fromArray(self::STUDENT_FIELDS);
            });
        })->download('xls');
    }

    public function importStudents(Request $request)
    {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {
                foreach ($data->toArray() as $key => $value) {
                    if (!empty($value)) {
                        foreach ($value as $v) {
                            $insert[] = ['title' => $v['title'], 'description' => $v['description']];
                        }
                    }
                }

                if (!empty($insert)) {
                    Item::insert($insert);
                    return back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        return back()->with('error', 'Please Check your file, Something is wrong there.');
    }


    /**
     * Import file into database Code
     *
     * @var array
     */
    public function importExcel(Request $request)
    {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {
                foreach ($data->toArray() as $key => $value) {
                    if (!empty($value)) {
                        foreach ($value as $v) {
                            $insert[] = ['title' => $v['title'], 'description' => $v['description']];
                        }
                    }
                }

                if (!empty($insert)) {
                    Item::insert($insert);
                    return back()->with('success', 'Insert Record successfully.');
                }
            }
        }

        return back()->with('error', 'Please Check your file, Something is wrong there.');
    }
}
