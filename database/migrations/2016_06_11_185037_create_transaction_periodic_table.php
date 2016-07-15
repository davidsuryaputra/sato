<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionPeriodicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     // inet bill, water bill, electric bill, salary, sell item, wash services, sponsor
    public function up()
    {
        Schema::create('transaction_periodic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('name');
            $table->softDeletes();
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
        Schema::drop('transaction_periodic');
    }
}
