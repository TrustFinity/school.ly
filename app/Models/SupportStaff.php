<?php

namespace App\Models;

use App\Models\School;
use App\Scopes\SchoolScope;
use App\Helpers\Search\Searcheable;
use App\Scopes\ActiveSupportStaffScope;
use Illuminate\Database\Eloquent\Model;

class SupportStaff extends Model
{
    use Searcheable;
    
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
        'role'
    ];

    public function rules()
    {
        return [
            'first_name'    => 'required|string',
            'middle_name'   => 'nullable|string',
            'last_name'     => 'required|string',
            'gender'        => 'required|string',
            'dob'           => 'required|date',
            'address'       => 'required|string',
            'role'          => 'required|string',
            'photo_url'     => 'nullable|image',
            'next_of_kin_full_names' => 'required|string',
            'next_of_kin_phone_number' => 'nullable|numeric|min:10',
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
        static::addGlobalScope(new ActiveSupportStaffScope());
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
