<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->indexed();
            $table->integer('journal_entry_id')->unsigned()->indexed();
            $table->integer('general_ledger_account_id')->unsigned()->indexed();
            $table->decimal('debit_record', 19,4)->default(0);
            $table->decimal('credit_record', 19,4)->default(0);

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('journal_entry_id')->references('id')->on('journal_entries');
            $table->foreign('general_ledger_account_id')->references('id')->on('general_ledger_accounts');
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
        Schema::dropIfExists('line_items');
    }
}
