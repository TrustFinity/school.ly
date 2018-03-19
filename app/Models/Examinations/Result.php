<?php

namespace App\Models\Examinations;

use App\Models\School;
use App\Scopes\SchoolScope;
use App\Models\Classes\Subject;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $with = [
        'subject', 
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
