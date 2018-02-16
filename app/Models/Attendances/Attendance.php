<?php

namespace App\Models\Attendances;

use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Scopes\SchoolScope;
use App\Models\Classes\Stream;
use App\Models\Classes\ClassGroup;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	protected $dates = ['date'];

    protected $fillable = [
        'boys',
        'girls',
        'stream_id',
        'class_group_id',
        'school_id',
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

    public function class_group()
    {
    	return $this->hasOne(ClassGroup::class);
    }

    public function stream()
    {
    	return $this->belongsTo(Stream::class);
    }
}
