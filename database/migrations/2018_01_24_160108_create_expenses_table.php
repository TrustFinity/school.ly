<?php

use App\Models\Transactions\Expense;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->index();
            $table->enum('payment_method', Expense::PAYMENT_METHODS);
            $table->integer('expense_account_id')->unsigned()->index();
            $table->integer('source_asset_account_id')->unsigned()->index();
            $table->decimal('amount', 19, 4);
            $table->string('receipt_number', 50)->nullable();
            $table->string('cheque_number', 50)->nullable();
            $table->text('description')->nullable();

            $table->foreign('school_id')->references('id')->on('schools');
            $table->timestamps();
        });

        Schema::table('expenses', function (Blueprint $table) {
            $table->foreign('expense_account_id')->references('id')->on('general_ledger_accounts');
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
        Schema::dropIfExists('expenses');
    }
}
