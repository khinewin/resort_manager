<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleitems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('item_name');
            $table->double('price');
            $table->integer('qty');
            $table->string('sale_from');
            $table->double('amount');
            $table->integer('ktvroom_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saleitems');
    }
}
