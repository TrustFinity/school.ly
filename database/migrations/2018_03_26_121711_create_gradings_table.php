<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->index();
            $table->decimal('minimum_range', 19,4);
            $table->decimal('maximum_range', 19,4);
            $table->string('grade');

            $table->foreign('school_id')->references('id')->on('schools');
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
        Schema::dropIfExists('gradings');
    }
}
