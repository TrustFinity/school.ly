<?php

namespace App\Observers;

use App\Models\School;
use App\Models\Settings\Setting;

/**
* observer to create school preferences after running command
*/
class SchoolObserver
{
    public function created(School $school)
    {
        $settings = new Setting([
            'school_id' => $school->id
        ]);

        $settings->save();
    }

    public function deleting(School $school)
    {
        # code...
    }
}
