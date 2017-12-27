<?php

namespace App\Models;

use App\Models\Classes\Level;
use App\Models\Classes\Subject;
use App\Models\Classes\Classroom;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'gender', 'age', 'address', 'classroom_id', 'level_id'];

    public static $validationRules = [
        'name' => 'required|string',
        'gender' => 'required',
        'age' => 'required|integer',
        'address' => 'required|string',
        'classroom_id' => 'required|integer',
        'level_id' => 'required|integer',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function getNameAttribute()
    {
        return $this->first_name. ' '.$this->middle_name.' '.$this->last_name;
    }
}
