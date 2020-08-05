<?php

namespace App\Http\Controllers;

use App\Order;
use App\Shop;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    protected $shop;
    protected $order;

    public function __construct(Shop $shop, Order $order)
    {
        $this->shop = $shop;
        $this->order = $order;
    }

    //get all shop in database
    public function index()
    {
        try {
            $shops = $this->shop->getAll();
            return response()->json([
                'code' => 200,
                'status' => 'OK',
                'shops' => $shops
            ]);
        } catch (\Exception $exception) {
            return \response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

    //get one shop in database
    public function getShop($id)
    {
        try {
            $shop = $this->shop->findShop($id);
            return \response()->json([
                'code' => 200,
                'status' => 'OK',
                'shop' => $shop
            ]);
        } catch (\Exception $exception) {
            return \response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

    // get column table shop in database
    public function getColumn($column)
    {
        try {
            $columnShop = $this->shop->getColumn($column);
            return \response()->json([
                'code' => 200,
                'data' => $columnShop
            ]);
        } catch (\Exception $exception) {
            return \response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

    // get count order in shop
    public function getOrder($id)
    {
        try {
            $count = $this->order->getOrder($id);
            return \response()->json([
                'code' => 200,
                'data' => $count
            ]);
        } catch (\Exception $exception) {
            return \response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

}
