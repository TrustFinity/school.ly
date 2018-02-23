<?php

namespace App\Models;

use Carbon\Carbon;
use App\Scopes\SchoolScope;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;
use App\Models\Classes\Subject;
use App\Scopes\ActiveTeacherScope;
use App\Models\Classes\ClassGroup;
use App\Helpers\Search\Searcheable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use Searcheable;

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
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'class_group_id',
        'level_id',
        'experience',
        'phone_number',
        'next_of_kin_names',
        'next_of_kin_phone_number',
        'joining_year'
    ];
    
    public function rules()
    {
         return [
            'first_name'    => 'required|string',
            'middle_name'   => 'nullable|string',
            'last_name'     => 'required|string',
            'gender'        => 'required|string',
            'dob'           => 'required|date',
            'joining_year'  => 'required|date',
            'leaving_year'  => 'nullable|date',
            'address'       => 'nullable|string',
            'class_group_id' => 'nullable|integer',
            'level_id'      => 'required|integer',
            'experience'    => 'required|string',
            'phone_number'  => 'nullable|numeric|min:10',
            'joining_year'  => 'required|date',
            'leaving_year'  => 'nullable|date',
            'photo_url'     => 'nullable|image',
            'next_of_kin_names' => 'required|string',
            'next_of_kin_phone_number' => 'nullable|numeric|min:10',
        ];
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
