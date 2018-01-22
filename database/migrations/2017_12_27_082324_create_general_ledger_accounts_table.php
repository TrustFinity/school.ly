<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralLedgerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_ledger_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->indexed();
            $table->string('name');
            $table->string('slug');
            $table->string('parent_identifier');
            $table->integer('parent_id');
            $table->string('identifier');
            $table->integer('real_depth');
            $table->decimal('balance', 19, 4)->nullable();
            $table->boolean('is_deletable')->default(true);

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
        Schema::dropIfExists('general_ledger_accounts');
    }
}
