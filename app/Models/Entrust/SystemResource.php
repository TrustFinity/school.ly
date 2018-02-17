<?php

namespace App\Models\Entrust;

use Illuminate\Database\Eloquent\Model;

/**
 * This is crude and is only being used for 
 * user access management.
 */
class SystemResource extends Model
{
	// Name corresonds to the route resource name.
	// For none resource routes, use base name.
	// For prefixed routes, use the preifx name.
    const RESOURCES = [
        'dashboard',
        'settings',
        'users',
        'teachers',
        'students',
        'class-groups',
        'streams',
        'levels',
        'subjects',
        'attendances',
        'chart-of-accounts',
        'transactions',
        'reports',
        'roles',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
