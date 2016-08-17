<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('quantity');
            $table->text('description');
            $table->integer('sub_total');
            $table->softDeletes();
            $table->timestamps();
            // $table->integer('transaction_category_id')->unsigned();
            // $table->integer('pricing_id')->unsigned();
            // $table->integer('periodic_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_details');
    }
}
