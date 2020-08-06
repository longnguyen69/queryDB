<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Shop;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    protected $shop;
    protected $order;
    protected $orderProduct;

    public function __construct(Shop $shop, Order $order, OrderProduct $orderProduct)
    {
        $this->shop = $shop;
        $this->order = $order;
        $this->orderProduct = $orderProduct;
    }

    //get all shop in database

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $shops = $this->shop->getAll();
            return view('filter/shop', compact('shops'));
        } catch (\Exception $exception) {
            return \response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

    //get one shop in database

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function getShop($id)
    {
        try {
            $shop = $this->shop->findShop($id);
            $orders = $this->order->getOrderShop($id);
            $countOrder = count($orders);
            return view('filter/shop-order', compact('shop','orders', 'countOrder'));
        } catch (\Exception $exception) {
            return \response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

    // get column table shop in database

    /**
     * @param $column
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
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
