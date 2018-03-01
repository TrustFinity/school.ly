<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\School;
use App\Models\Entrust\Role;
use App\Models\Classes\Level;
use App\Models\Classes\Subject;
use Illuminate\Console\Command;
use App\Models\Settings\Setting;
use App\Models\Classes\ClassGroup;

class CreateSchool extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'darasini:create-school {name} {--primary} {--secondary}';

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
        //***************************************************************************
        // Create school
        $new_school = School::create([
            'name' => $school_name,
            'slug' => $school_slug
        ]);

        if($this->option('primary')){
            // Prefferences
            // **************************************************************************
            $primary_preferences = new Setting;
            $primary_preferences->school_id = $new_school->id;
            $primary_preferences->instructors_type = 'Teachers';
            $primary_preferences->institution_type = 'Primary';
            $primary_preferences->lower_grade_level = 40;
            $primary_preferences->upper_grade_level = 74;
            $primary_preferences->attendants_type = 'Pupils';
            $primary_preferences->save();

            // Level
            $not_applicable = Level::create([
                'school_id' => $new_school->id,
                'name' => "Not Applicable",
            ]);
            foreach (LEVELS['Primary'] as $class) {
                // Class Groups
                $class_group = new ClassGroup;
                $class_group->school_id = $new_school->id;
                $class_group->level_id  = $not_applicable->id;
                $class_group->name  = $class;
                $class_group->save();
            }
            // Subjects
            foreach (["English", 
                "Mathematics", 
                "Social Studies", 
                "Science"
            ] as $subject_name) {
                $subject = new Subject;
                $subject->name = $subject_name;
                $subject->school_id = $new_school->id;
                $subject->level_id = $not_applicable->id;
                $subject->save();
            }
        }

        // *****************************************************************************
        if($this->option('secondary')){
            // Preferences
            // **************************************************************************
            $secondary_preferences = new Setting;
            $secondary_preferences->school_id = $new_school->id;
            $secondary_preferences->instructors_type = 'Teachers';
            $secondary_preferences->institution_type = 'Secondary';
            $secondary_preferences->lower_grade_level = 40;
            $secondary_preferences->upper_grade_level = 74;
            $secondary_preferences->attendants_type = 'Students';
            $secondary_preferences->save();

            // Levels
            $o_level = Level::create([
                'school_id' => $new_school->id,
                'name' => "O'Level",
            ]);
            foreach (LEVELS['Ordinary Level'] as $class) {
                // Class Groups
                $class_group = new ClassGroup;
                $class_group->school_id = $new_school->id;
                $class_group->level_id  = $o_level->id;
                $class_group->name  = $class;
                $class_group->save();
            }
            // Subjects
            foreach (["English", 
                "Mathematics", 
                "Georgraphy", 
                "Biology"
            ] as $subject_name) {
                $subject = new Subject;
                $subject->name = $subject_name;
                $subject->school_id = $new_school->id;
                $subject->level_id = $o_level->id;
                $subject->save();
            }

            $a_level = Level::create([
                'school_id' => $new_school->id,
                'name' => "A'Level",
            ]);
            foreach (LEVELS['Advanced Level'] as $class) {
                // Class Groups
                $class_group = new ClassGroup;
                $class_group->school_id = $new_school->id;
                $class_group->level_id  = $o_level->id;
                $class_group->name  = $class;
                $class_group->save();
            }
            // Subjects
            foreach (["Chemistry", 
                "Physics", 
                "Georgraphy", 
                "Biology", 
                "Literature"
            ] as $subject_name) {
                $subject = new Subject;
                $subject->name = $subject_name;
                $subject->school_id = $new_school->id;
                $subject->level_id = $a_level->id;
                $subject->save();
            }
        }
        // *****************************************************************************
        // Create user
        $user = new User;
        $user->school_id  = $new_school->id;
        $user->username   = $school_slug;
        $user->password   = bcrypt('password');
        $user->first_name = $school_name;
        $user->last_name  = 'Director';
        $user->save();

        // *****************************************************************************
        // Set the role
        $role = Role::where('name', Role::DIRECTOR)->first();
        $user->roles()->sync($role->id);

        $this->info('New School has been created Boostrapped in the process: ');
        $this->info("School Name: \t\t $school_name");
        $this->info("Directors Username: \t $school_slug");
        $this->info("Default password is 'password'. Please change it as soon as you start using the system.");
    }
}
