<?php

namespace App\Models;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    protected $fillable = [
        'school_id',
        'name',
        'start_date',
        'end_date',
    ];

    public function rules()
    {
        return [
            // 'school_id' => 'required|integer',
            'name'       => 'required|string|min:4',
            'start_date' => 'nullable|date',
            'end_date'   => 'nullable|date',
        ];
    }

    //todo pius make sure this doesn't break
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
