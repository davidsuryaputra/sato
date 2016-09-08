<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table){
          $table->increments('id');
          $table->integer('customer_id')->unsigned();
          $table->integer('showroom_id')->unsigned();
          $table->integer('item_id')->unsigned();
          $table->string('no_kendaraan');
          $table->string('status');
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
        Schema::drop('queues');
    }
}
