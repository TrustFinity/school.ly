<?php

namespace App;

use App\Models\Settings\Setting;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function preferences()
    {
        return $this->belongsTo(Setting::class);
    }
}
