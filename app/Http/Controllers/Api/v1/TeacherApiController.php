<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherApiController extends Controller
{
    public function search (Request $request)
    {
        $students = Teacher::with(['classgroup', 'level'])
            ->where('search_term', 'LIKE', '%'.$request->search.'%')
            ->limit(10)
            ->get();
        return $students;
    }
}
