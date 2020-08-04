<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVouchers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('discountable_type', 45);
            $table->integer('discountable_id');
            $table->string('title', 45);
            $table->string('coupon', 45);
            $table->string('type', 45);
            $table->integer('discount');
            $table->integer('quantity');
            $table->dateTime('begin_at');
            $table->dateTime('end_at');
            $table->integer('display');
            $table->integer('minimum_order_price');
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
        Schema::dropIfExists('vouchers');
    }
}
