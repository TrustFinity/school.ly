<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportStaffAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_staff_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('school_id')->unsigned();
            $table->integer('support_staff_id')->unsigned();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('date');
            $table->boolean('is_present');
            $table->timestamps();

        });

        Schema::table('support_staff_attendances', function($table) {
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('support_staff_id')->references('id')->on('support_staffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_staff_attendances');
    }
}
