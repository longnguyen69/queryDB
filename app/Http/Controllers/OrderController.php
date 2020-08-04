<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderShiping;
use App\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //get all order in database
    public function index()
    {
        try {
            $orders = DB::table('orders')->get();
            return response()->json([
                'code' => 200,
                'data' => $orders
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

    // get oder
    public function getOrder($id)
    {
        try {
            $order = DB::table('orders')->find($id);
            $voucher = DB::table('vouchers')->find($order->voucher_id);
            $shop = DB::table('shops')->find($order->shop_id);
            return response()->json([
                'code' => 200,
                'voucher' => $voucher,
                'shop' => $shop,
                'data' => $order
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

    // add order
    public function store($request)
    {
        try {
            DB::beginTransaction();
            $order = new Order();
            $order->type = $request->type;
            $order->fiin_user_code = $request->find_user_code;
            $order->context = $request->context;
            $order->note = $request->note;
            $order->transport_fee = $request->transport_fee;
            $order->discount = $request->discount;
            $order->status = $request->status;
            $order->final_price = $request->final_price;
            $order->reason = $request->reason;
            $order->cancel_by = $request->cacenl_by;
            $order->price = $request->price;
            $order->voucher_id = $request->voucher;
            $order->shop_id = $request->shop;
            $order->save();
            $voucher = DB::table('voucher')->find($request->voucher);
            if ($voucher->quantity > 0) {
                $voucher->decrement('quantity', 1);
                $orderShip = new OrderShiping();
                $orderShip->shiping_id = $request->shiping;
                $orderShip->code = $request->code;
                $orderShip->from = $request->from;
                $orderShip->to = $request->to;
                $orderShip->shipment_date = Carbon::now();
                $orderShip->expect_delivery_date = Carbon::now()->addDays(3);
                $orderShip->save();
                DB::commit();
                return response()->json([
                    'code' => 200,
                    'status' => true
                ]);
            } else {
                throw new \Exception('Voucher expired');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }
}
