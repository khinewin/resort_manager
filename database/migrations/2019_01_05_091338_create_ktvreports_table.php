<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKtvreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktvreports', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->dateTime('check_in');
            $table->dateTime('check_out')->nullable();
            $table->integer('ktvroom_id');
            $table->integer('user_id');
            $table->float('room_price');
            $table->float('amount')->nullable();
            $table->boolean("status")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ktvreports');
    }
}
