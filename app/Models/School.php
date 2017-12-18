<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'location',
        'contact',
        'alternative_contact',
        'super_user_id'
    ];

    public function rules()
    {
        return [
            'name'                  => 'required|string',
            'location'              => 'sometimes|string',
            'contact'               => 'sometimes|string',
            'alternative_contact'   => 'sometimes|string',
        ];
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'super_user_id');
    }
}
