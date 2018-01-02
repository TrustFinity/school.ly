<?php

namespace App\Models;

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
        return $this->belongsTo(Setting::class);
    }
}
