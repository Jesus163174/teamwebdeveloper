<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname',100);
            $table->string('phone',10);
            $table->string('homeaddress',1500);
            $table->string('businessadress',1500);
            $table->string('status')->default('prestar');
            $table->string('email',100);
            $table->integer('recorder_id')->unsigned();
            $table->foreign('recorder_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**,
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
