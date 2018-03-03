<?php

use Illuminate\Database\Seeder;
use App\SharedSeeders\GLA\GLASharedSeeder;

class GLASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new GLASharedSeeder)->seedForAll();
    }
}
