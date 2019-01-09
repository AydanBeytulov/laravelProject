<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("userId");
            $table->integer("orderId");
            $table->string("name");
            $table->integer("qty");
            $table->string("itemTable", 50);
            $table->integer("itemId");
            $table->decimal("price" , 11, 2);
            $table->decimal("totalPrice" ,11 , 2);
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
        Schema::dropIfExists('rooms_cart');
    }
}
