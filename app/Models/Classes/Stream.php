<?php

namespace App\Models\Classes;

use App\Models\Student;
use App\Models\Teacher;
use App\Scopes\SchoolScope;
use App\Models\Classes\ClassGroup;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $guarded = [];

    /**
     * The "booting" method of the model.
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    public function classGroup()
    {
        return $this->belongsTo(ClassGroup::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
