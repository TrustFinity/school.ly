<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Admin;
use App\Models\School;
use Illuminate\Console\Command;

class CreateSchool extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'darasani:create-school {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New School';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $school_name = $this->argument('name');
        $school_slug = str_slug($school_name);

        $new_school = School::create([
            'name' => $school_name,
            'slug' => $school_slug
        ]);

        $school_id = School::where('slug', $school_slug)->first()->id;
        $admin = new Admin([
            'school_id' => $school_id,
            'name'      => $school_name,
            'username'  => $school_slug
        ]);

        if ($admin->save() && $new_school->save()) {
            $admin_id  = Admin::where('username', $school_slug)->first()->id;

            User::create([
                'school_id'     => $school_id,
                'username'      => $school_slug,
                'password'      => bcrypt('password'),
                'userable_id'   => $admin_id,
                'userable_type' => 'Admin'
            ]);
        } else {
            $this->error('School admin couldn\'t be created. Rolling back changes...');

            //todo: rollback all changes and clean this up
        }

        $this->info('New School has been created: ');
        $this->info("School Name: \t\t $school_name");
        $this->info("Admin Username: \t $school_slug");
        $this->info("Default password is 'password'. Please change it as soon as you start using the system.");
    }
}
