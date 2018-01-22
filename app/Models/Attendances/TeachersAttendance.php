<?php

namespace App\Models\Attendances;

use App\Models\School;
use App\Models\Teacher;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class TeachersAttendance extends Model
{
    protected $dates = ['date'];

    protected $fillable = [
        'is_present',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class);
    }
}
