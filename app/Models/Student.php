<?php

namespace App\Models;

use Carbon\Carbon;
use App\Scopes\SchoolScope;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;
use App\Models\Classes\Subject;
use App\Scopes\ActiveStudentScope;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'address',
        'parents_names',
        'parents_phone_numbers',
        'stream_id',
        'level_id'
    ];

    public static $validationRules = [
        'first_name'          => 'required|string',
        'middle_name'          => 'sometimes|string',
        'last_name'          => 'required|string',
        'gender'        => 'required',
        'dob'           => 'required|date',
        'address'       => 'required|text',
        'stream_id'     => 'required|integer',
        'parents_names'  => 'required|string',
        'level_id'      => 'required|integer',
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
        static::addGlobalScope(new ActiveStudentScope());
    }

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

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
