<?php

namespace App\Observers;

/**
* observer to create school references after running command
*/
class SchoolObservers
{
    public function created(School $school)
    {
        # code...
    }

    public function deleting(School $school)
    {
        # code...
    }
}
