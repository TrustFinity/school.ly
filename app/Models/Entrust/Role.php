<?php

namespace App\Models\Entrust;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Roles are not school scoped since this is
     * a simple implementation that will used accross
     * all schools setting.
     *
     * A user can have multiple roles and a role can belong to
     * multiple users, this makes it a many to many relationship.
     */
    const DIRECTOR = 'Director';
    const HEADTEACHER = 'Headteacher';
    const DEPUTY_HEADTEACHER = 'Deputy Headteacher';
    const DOS = 'Director of Studies';
    const BUSAR = 'Busar';
    const ADMINISTRATOR = 'Administrator';
    const SUPPORT_STAFF = 'Support Staff';
    const TEACHER = 'Teacher';
    const IT = 'I.T';
    
    /**
     * This are the sets of roles that will govern access levels
     * in the darasini app.
     *
     * Once this goes to production, create different array to be seeded adding to
     * this set of roles.
     * @var Array if string roles.
     */
    const ROLES = [
    	self::DIRECTOR => 'The overall head of the institution, only applies for privately own institutions.',
    	self::HEADTEACHER => 'The headmaster, headteacher or headmistress.', 
    	self::DEPUTY_HEADTEACHER => 'The deputy to the head teacher.', 
    	self::DOS => 'The person handling timetabling, examination and all acedimics of the institution.',
    	self::BUSAR => 'The account of the institution.',
    	self::ADMINISTRATOR => 'This role should be given to non teaching administrators handling other departments of the school.',
    	self::SUPPORT_STAFF => 'Role granting access for the head of staff to manage staff module',
        self::TEACHER => 'Any teacher irrespective of being a full-time or non part time.',
    	self::IT => 'Role given the information technology personel of the institution.',
    ];

    public function user()
    {
    	return $this->belongsToMany(User::class);
    }

    public function resources()
    {
        return $this->belongsToMany(SystemResource::class);
    }
}
