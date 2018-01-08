<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentApiController extends Controller
{
    public function search (Request $request)
    {
        $students = Student::with(['classroom', 'level'])
                            ->where('first_name', 'LIKE', '%'.$request->search.'%')
                            ->limit(10)
                            ->get();
        return $students;
    }
}
