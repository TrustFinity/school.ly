<?php

namespace App\Models\Classes;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];

    public function classGroups()
    {
        return $this->hasMany(ClassGroup::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
