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

    public function hasRole($userable_type = null)
    {
        if ($userable_type) {
            return $this->userable_type == $userable_type;
        }

        return $this->userable_type;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
