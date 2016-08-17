<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('order_by')->unsigned();
          $table->date('order_date');
          $table->string('payment_type');
          $table->integer('received_by')->nullable();
          $table->string('vendor');
          $table->integer('total_quantity');
          $table->integer('total_amount');
          $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchase_orders');
    }
}
