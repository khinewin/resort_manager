<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKtvroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktvrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('room_number');
            $table->string('room_type');
            $table->float('hour_price');
            $table->boolean('status')->nullable();
            $table->integer('check_in_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ktvrooms');
    }
}
