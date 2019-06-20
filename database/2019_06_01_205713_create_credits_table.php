<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');
            $table->double('totalamount');
            $table->double('total');
            $table->double('wainnings');
            $table->integer('totalpayments');
            $table->date('date');
            $table->date('initialDate');
            $table->date('finishDate');
            $table->double('dayPayments');

            $table->string('status')->default('prestado');

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('lender_id')->unsigned();
            $table->foreign('lender_id')->references('id')->on('users');
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
        Schema::dropIfExists('credits');
    }
}
