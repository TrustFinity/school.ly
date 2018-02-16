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
            $table->integer('boys');
            $table->integer('girls');
            $table->date('date');
            $table->timestamps();
        });

        Schema::table('attendances', function($table) {
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('class_group_id')->references('id')->on('class_groups');
            $table->foreign('stream_id')->references('id')->on('streams');
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
