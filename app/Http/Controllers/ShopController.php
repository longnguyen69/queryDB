<?php

namespace App\Http\Controllers;

use App\Order;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    //get all shop in database
    public function index()
    {
        try {
            $shops = DB::table('shops')->get();
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
            $shop = DB::table('shops')->find($id);
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
            $columnShop = DB::table('shops')->pluck($column);
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
    public function count($id)
    {
        try {
            $count = DB::table('order')->where('shop_id');
            return \response()->json([
                'code' => 200,
                'data' => count($count)
            ]);
        } catch (\Exception $exception) {
            return \response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }
}
