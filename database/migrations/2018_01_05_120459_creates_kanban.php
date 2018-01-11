<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatesKanban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanbans', function (Blueprint $table) {
            $table->integer('school_id')->unsigned()->index();
            $table->integer('teacher_id')->unsigned()->index();
            $table->integer('class_group_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index()->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('status');
            $table->boolean('fixed')->default(false);

            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('class_group_id')->references('id')->on('class_groups');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kanbans');
    }
}
