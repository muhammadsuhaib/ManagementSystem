<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePettyCashSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petty_cash_systems', function (Blueprint $table) {
            $table->increments('id');
//            $table->date('request_date');
            $table->integer('branch_id');
//            $table->integer('total_recieved_money');
//            $table->integer('over_amount');
//            $table->integer('total_payment');
//            $table->integer('balance');
            $table->string('type');
            $table->string('subject');
            $table->string('amount');
            $table->string('department');
            $table->string('note');


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
        Schema::dropIfExists('petty_cash_systems');
    }
}
