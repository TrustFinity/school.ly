<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->indexed();
            $table->integer('classgroup_id')->unsigned()->nullable();
            $table->integer('level_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('experience');
            $table->integer('age')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('next_of_kin_names');
            $table->string('next_of_kin_phone_number')->nullable();

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('classgroup_id')->references('id')->on('classgroups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
