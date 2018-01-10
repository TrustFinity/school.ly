<?php

namespace App\Models;

use App\Models\Classes\Stream;
use App\Models\Settings\Setting;
use App\Models\Classes\ClassGroup;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'school_url',
        'address',
        'headmasters_name',
        'logo_url'
    ];

    public function rules()
    {
        return [
            'name'                  => 'required|string',
            'slug'                  => 'required|string',
            'school_url'            => 'sometimes|string',
            'address'               => 'sometimes|string',
            'headmasters_name'      => 'sometimes|string',
            'logo_url'              => 'sometimes|string',
        ];
    }

    public function preferences()
    {
        return $this->hasOne(Setting::class);
    }

    public function streams()
    {
        return $this->hasMany(Stream::class);
    }

    public function classGroups()
    {
        return $this->hasMany(ClassGroup::class);
    }
}
