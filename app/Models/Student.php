<?php

namespace App\Models;

use Carbon\Carbon;
use App\Scopes\SchoolScope;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;
use App\Models\Classes\Subject;
use App\Scopes\ActiveStudentScope;
use App\Helpers\Search\Searcheable;
use App\Models\Transactions\SchoolFee;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use Searcheable;

    protected $dates = [
        'joining_year',
        'dob',
        'leaving_year'
    ];

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'address',
        'parents_names',
        'parents_phone_number',
        'stream_id',
        'level_id',
        'joining_year',
        'leaving_year',
    ];

    public function rules () {

        return [
            'first_name'    => 'required|string',
            'middle_name'   => 'nullable|string',
            'last_name'     => 'required|string',
            'gender'        => 'required',
            'dob'           => 'required|date',
            'joining_year'  => 'required|date',
            'leaving_year'  => 'nullable|date',
            'address'       => 'nullable|string',
            'stream_id'     => 'required|integer',
            'parents_names' => 'required|string',
            'level_id'      => 'required|integer',
            'photo_url'     => 'nullable|image',
            'parents_names' => 'nullable|string',
            'parents_phone_number' => 'nullable|numeric|min:10',
        ];
    }

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

    public function scopeMalePerformance()
    {
        return collect([2, 10, 80, 50, 100]);
    }

    public function scopeFemalePerformance()
    {
        return collect([10, 5, 50, 60, 80]);
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

    public function results()
    {
        return $this->hasMany(Result::class);
    }
  
    public function fees()
    {
        return $this->hasMany(SchoolFee::class);
    }
}
