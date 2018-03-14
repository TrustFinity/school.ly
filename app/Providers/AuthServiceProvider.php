<?php

namespace App\Providers;

use App\Models\School;
use App\Models\Student;
use App\Observers\SchoolObserver;
use App\Observers\StudentObserver;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        School::observe(SchoolObserver::class);
        Student::observe(StudentObserver::class);
    }
}
