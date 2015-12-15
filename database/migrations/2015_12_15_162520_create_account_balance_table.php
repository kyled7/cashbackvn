<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_balance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->double('amount');
            $table->timestamps();
        });

        Schema::create('account_balance_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_balance_id');
            $table->double('amount_change');
            $table->string('description');
            $table->timestamps();
        });

        Scheme::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('retailer_id');
            $table->double('amount');
            $table->string('status', 10);
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
        Schema::drop('account_balance');
        Schema::drop('account_balance_history');
        Schema::drop('transactions');
    }
}
