<?php

namespace App\Models\Classes;

use App\Models\Student;
use App\Models\Teacher;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];

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

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
