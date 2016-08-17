<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // nama item, qty, harga, lokasi showroom, category material stock or asset
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('showroom_id')->unsigned();
            $table->integer('item_category_id')->unsigned();
            $table->string('name');
            $table->integer('stock')->nullable();
            $table->integer('value');
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
        Schema::drop('items');
    }
}
