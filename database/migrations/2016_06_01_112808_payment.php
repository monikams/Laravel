<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payment extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('payment', function(Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('size');
            $table->string('time');
            $table->integer('active');
            $table->integer('user_id')->unsigned();
            $table->integer('price');
            $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('payment');
    }

}
