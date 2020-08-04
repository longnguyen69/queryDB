<?php

use Illuminate\Database\Seeder;

class SeederSample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Shop::class, 1000)->create();
        factory(\App\Voucher::class, 1500)->create();
        factory(\App\Order::class, 2000)->create();
        factory(\App\Shiping::class, 3)->create();
        factory(\App\OrderProduct::class, 3000)->create();
        factory(\App\OrderShiping::class, 1000)->create();
    }
}
