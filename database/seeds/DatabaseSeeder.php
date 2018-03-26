<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SystemResourceSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        
        $this->call(SchoolTableSeeder::class);

        //Generic Seeders
        $this->call(LevelsTableSeeder::class);

        //school specific seeders
        $this->call(StreamSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(TermSeeder::class);
        $this->call(ExaminationsSeeder::class);
        $this->call(GradingSeeder::class);

        $this->call(SchoolPreferenceSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(StudentsSeeder::class);
        $this->call(TeachersSeeder::class);
        $this->call(SupportStaffSeeder::class);

        //Teaching features
        $this->call(KanbanSeeder::class);

        // Chart of accounts
        $this->call(GLASeeder::class);

        /**
         * Production Seeds
         */
        // System Resources.
        // $this->call(GradingResourcesSeeder::class);
    }
}
