<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderShipings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shipings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shiping_id');
            $table->foreign('shiping_id')->references('id')->on('shipings');
            $table->string('code', 25);
            $table->string('from', 25);
            $table->string('to');
            $table->dateTime('shipment_date');
            $table->dateTime('expect_delivery_date');
            $table->unsignedBigInteger('orders_id');
            $table->foreign('orders_id')->references('id')->on('orders');
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
        Schema::dropIfExists('order_shipings');
    }
}
