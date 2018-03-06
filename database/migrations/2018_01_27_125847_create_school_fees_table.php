<?php

use App\Models\Transactions\SchoolFee;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->index();
            $table->string('payment_method');
            $table->integer('equity_account_id')->unsigned()->index();
            $table->integer('source_asset_account_id')->unsigned()->index();
            $table->integer('student_id')->unsigned()->index();
            $table->decimal('amount', 19, 4);
            $table->string('receipt_number', 50)->nullable();
            $table->string('bank_slip_number', 50)->nullable();
            $table->string('stream')->nullable();
            $table->string('term');
            $table->date('year');

            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('equity_account_id')->references('id')->on('general_ledger_accounts');
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
        Schema::dropIfExists('school_fees');
    }
}
