<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->indexed();

            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->default('Other');
            $table->string('telephone_number')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->integer('userable_id')->nullable();
            $table->string('userable_type')->nullable();
            $table->unique(['userable_id', 'userable_type']);

            $table->foreign('school_id')->references('id')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
