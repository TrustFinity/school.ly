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
    protected $signature = 'darasini:create-school {name}';

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
        $email = $this->ask('What is your email address?');

        $admin = new Admin([
            'name'      => $school_name,
            'username'  => str_slug($school_name)
        ]);

        if ($admin->save()) {
            $admin_id = Admin::where('username', str_slug($school_name))->first()->id;

            User::create([
                'name'          => str_slug($school_name),
                'email'         => $email,
                'password'      => bcrypt('password'),
                'userable_id'   => $admin_id,
                'userable_type' => 'Admin'
            ]);

            $user_id = User::where('userable_id', $admin_id)->first()->id;

            $new_school = School::create([
                'name'          => $school_name,
                'super_user_id' => $user_id
            ]);
        } else {
            $this->error('School admin couldn\'t be created. Rolling back changes...');

            //todo: rollback all changes and clean this up
        }

        $this->info('New School has been created: ');
        $this->info("School Name: \t $school_name");
        $this->info("Admin User: \t  $email");
        $this->info("Default password is 'password'. Please change it as soon as you start using the system.");
    }
}
