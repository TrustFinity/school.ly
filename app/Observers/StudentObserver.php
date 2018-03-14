<?php

namespace App\Observers;

use App\Models\Student;

/**
* observer to creating student event
*/
class StudentObserver
{
    public function creating(Student $student)
    {
        $student->search_term = $student->constructSearchTerm();
    }
}
