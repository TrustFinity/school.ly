<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->index();
            $table->integer('support_staff_id')->unsigned()->index();
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->integer('liability_account_id')->unsigned()->index();
            $table->integer('source_asset_account_id')->unsigned()->index();
            $table->string('payment_method');
            $table->date('month');
            $table->decimal('amount', 19, 4);
            $table->string('receipt_number', 50)->nullable();
            $table->string('cheque_number', 50)->nullable();

            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('support_staff_id')->references('id')->on('support_staffs');
            $table->foreign('liability_account_id')->references('id')->on('general_ledger_accounts');
            $table->foreign('source_asset_account_id')->references('id')->on('general_ledger_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
