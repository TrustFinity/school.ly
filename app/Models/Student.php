<?php

namespace App\Models;

use App\Scopes\SchoolScope;
use App\Models\Classes\Level;
use App\Models\Classes\Subject;
use App\Models\Classes\Classroom;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'age',
        'address',
        'parents_names',
        'parents_phone_numbers',
        'classroom_id',
        'level_id',
    ];

    public static $validationRules = [
        'first_name'          => 'required|string',
        'middle_name'          => 'sometimes|string',
        'last_name'          => 'required|string',
        'gender'        => 'required',
        'age'           => 'required|integer',
        'address'       => 'required|text',
        'classroom_id'  => 'required|integer',
        'parents_names'  => 'required|string',
        'level_id'      => 'sometimes|integer',
        'parents_phone_number'      => 'sometimes|integer',
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
