<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->integer('role_id')->unsigned();
            $table->integer('showroom_id')->nullable()->unsigned();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('salary')->nullable();
            $table->string('no_kendaraan')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });

        /*
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
