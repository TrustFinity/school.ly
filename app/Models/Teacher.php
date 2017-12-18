<?php

namespace App\Models;

use App\Scopes\SchoolScope;
use App\Models\Classes\Level;
use App\Models\Classes\Subject;
use App\Models\Classes\Classgroup;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
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

    protected $fillable = [
        'name',
        'gender',
        // 'classroom_id',
        'classgroup_id',
        'level_id',
        'experience',
        'phone'
    ];

    public static $validationRules = [
        'name'          => 'required|string',
        'gender'        => 'required',
        // 'classroom_id'  => 'required|integer',
        'classgroup_id' => 'required|integer',
        'level_id'      => 'required|integer',
        'experience'    => 'required|string',
        'phone'         => 'required|digits_between:7,10',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function classgroup()
    {
        return $this->belongsTo(Classgroup::class, 'classgroup_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }

    public function getNameAttribute()
    {
        return $this->first_name. ' '.$this->middle_name.' '.$this->last_name;
    }
}
