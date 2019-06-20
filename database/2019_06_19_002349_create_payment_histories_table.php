<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('lender_id')->unsigned();
            $table->date('paymentDateCurrent');
            $table->date('paymentDate');
            $table->integer('numberPay');
            $table->double('payment');
            $table->integer('credit_id')->unsigned();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('lender_id')->references('id')->on('users');
            $table->foreign('credit_id')->references('id')->on('credits');
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
        Schema::dropIfExists('payment_histories');
    }
}
