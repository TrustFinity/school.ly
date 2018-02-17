<?php

namespace App\Models;

use App\Models\Entrust\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'gender',
        'telephone_number',
        'userable_id',
        'userable_type',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getNameAttribute()
    {
        return $this->first_name .' '.$this->last_name;
    }

    public function userable()
    {
        return $this->morphTo();
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Checks if user has the permision to access the 
     * page they are attempting to load.
     * 
     * @return boolean [description]
     */
    public function isPermitted($request)
    {
        return false;
    }
}
