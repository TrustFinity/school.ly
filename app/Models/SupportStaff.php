<?php

namespace App\Models;

use App\Models\School;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class SupportStaff extends Model
{
    protected $dates = [
        'dob',
    ];

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'dob',
        'gender',
        'phone_number',
        'email',
        'role',
        'next_of_kin_full_names',
        'next_of_kin_phone_number',
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

    public function getNameAttribute()
    {
        return $this->first_name. ' '.$this->middle_name.' '.$this->last_name;   
    }

    public function school()
    {
        return $this->belongTo(School::class);
    }
}
