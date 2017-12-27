<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePettyCashTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petty_cash_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carry_over_amount');
                $table->integer('total_received_amount');
                    $table->integer('total_payment');
                        $table->integer('balance');
                                $table->integer('checker_opening_amount');

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
        Schema::dropIfExists('petty_cash_transactions');
    }
}
