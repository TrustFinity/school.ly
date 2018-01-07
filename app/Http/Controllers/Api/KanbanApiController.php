<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Kanban;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KanbanApiController extends Controller
{
    public function loadForTeacher(Teacher $teacher)
    {
        return Kanban::where('teacher_id', $teacher->id)
            ->with(['classgroup'])
            ->get();
    }
}
