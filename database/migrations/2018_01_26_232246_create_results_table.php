<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('examination_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('class_group_id')->unsigned();
            $table->decimal('marks', 3, 2);

            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('examination_id')->references('id')->on('examinations');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('class_group_id')->references('id')->on('class_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
