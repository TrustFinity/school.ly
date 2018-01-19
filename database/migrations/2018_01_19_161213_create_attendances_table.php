<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('school_id')->unsigned();
            $table->integer('class_group_id')->unsigned()->nullable();
            $table->integer('stream_id')->unsigned()->nullable();
            $table->integer('student_id')->unsigned();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('date');
            $table->boolean('is_present');
            $table->timestamps();
        });

        Schema::table('attendances', function($table) {
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('class_group_id')->references('id')->on('class_groups');
            $table->foreign('stream_id')->references('id')->on('streams');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
