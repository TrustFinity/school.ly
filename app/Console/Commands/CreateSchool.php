<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateSchool extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schoolly:create-school';

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
        //
    }
}
