<?php

namespace App\Models;

use Carbon\Carbon;
use App\Scopes\SchoolScope;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;
use App\Models\Classes\Subject;
use App\Scopes\ActiveTeacherScope;
use App\Models\Classes\ClassGroup;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $dates = [
        'joining_year',
        'dob',
        'leaving_year'
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
        static::addGlobalScope(new ActiveTeacherScope());
    }

    protected $fillable = [
        'name',
        'gender',
        // 'stream_id',
        'class_group_id',
        'level_id',
        'experience',
        'phone'
    ];

    public static $validationRules = [
        'name'          => 'required|string',
        'gender'        => 'required',
        // 'stream_id'  => 'required|integer',
        'class_group_id' => 'required|integer',
        'level_id'      => 'required|integer',
        'experience'    => 'required|string',
        'phone'         => 'required|digits_between:7,10',
        'joining_year'  => 'required|date',
        'leaving_year'  => 'nullable|date',
    ];

    public function getNameAttribute()
    {
        return $this->first_name. ' '.$this->middle_name.' '.$this->last_name;
    }

    public function getAgeAttribute()
    {
        return Carbon::now()->diffInYears(Carbon::parse($this->dob));
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function classGroup()
    {
        return $this->belongsTo(ClassGroup::class, 'class_group_id');
    }

    public function stream()
    {
        return $this->belongsTo(Stream::class, 'stream_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }
}
