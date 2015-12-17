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
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('amount')->default(0);
            $table->timestamps();
        });

        Schema::create('account_balance_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_balance_id')->unsigned()->index();
            $table->foreign('account_balance_id')->references('id')->on('account_balance')->onDelete('cascade');
            $table->double('amount_change');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('account_balance_history');
        Schema::drop('account_balance');
        Schema::drop('transactions');
    }
}
