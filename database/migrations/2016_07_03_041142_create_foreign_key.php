<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->foreign('showroom_id')->references('id')->on('showrooms')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('items', function (Blueprint $table) {
        $table->foreign('showroom_id')->references('id')->on('showrooms')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('item_category_id')->references('id')->on('item_categories')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('bill_details', function (Blueprint $table){
        $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('ads', function (Blueprint $table) {
        $table->foreign('advertiser_id')->references('id')->on('advertisers')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('salary', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('purchase_order_details', function (Blueprint $table) {
        $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->onDelete('cascade')->onUpdate('cascade');
      });

      
      Schema::table('transaction_details', function (Blueprint $table) {
        $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('transactions', function (Blueprint $table) {
        $table->foreign('showroom_id')->references('id')->on('showrooms')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('operator_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['showroom_id']);
        $table->dropForeign(['role_id']);
      });

      Schema::table('items', function (Blueprint $table){
        $table->dropForeign(['showroom_id']);
        $table->dropForeign(['item_category_id']);
      });

      Schema::table('bill_details', function (Blueprint $table) {
        $table->dropForeign(['bill_id']);
      });

      Schema::table('ads', function (Blueprint $table) {
        $table->dropForeign(['advertiser_id']);
      });

      Schema::table('salary', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
      });

      Schema::table('purchase_order_details', function (Blueprint $table) {
        $table->dropForeign(['purchase_order_id']);
      });


      Schema::table('transaction_details', function (Blueprint $table) {
        $table->dropForeign(['transaction_id']);
        $table->dropForeign(['item_id']);
      });

      Schema::table('transactions', function (Blueprint $table) {
        $table->dropForeign(['showroom_id']);
        $table->dropForeign(['customer_id']);
        $table->dropForeign(['operator_id']);
      });


    }
}
