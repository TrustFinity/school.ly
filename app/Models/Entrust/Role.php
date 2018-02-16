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
    
    /**
     * This are the sets of roles that will govern access levels
     * in the darasini app.
     *
     * Once this goes to production, create different array to be seeded adding to
     * this set of roles.
     * @var Array if string roles.
     */
    const ROLES = [
    	'Director' => 'The overall head of the institution, only applies for privately own institutions.',
    	'Headteacher' => 'The headmaster, headteacher or headmistress.', 
    	'Deputy Headteacher' => 'The deputy to the head teacher.', 
    	'Director of Studies' => 'The person handling timetabling, examination and all acedimics of the institution.',
    	'Busar' => 'The account of the institution.',
    	'Administrator' => 'This role should be given to non teaching administrators handling other departments of the school.',
    	'Support Staff' => 'Role granting access for the head of staff to manage staff module',
    	'Teacher' => 'Any teacher irrespective of being a full-time or non part time.',
    ];

    public function user()
    {
    	return $this->belongsToMany(User::class);
    }
}
