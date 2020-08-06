<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Order;
use App\OrderProduct;
use App\OrderShiping;
use App\Shop;
use App\Voucher;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $order;
    protected $voucher;
    protected $shop;
    protected $orderShiping;
    protected $orderProducut;

    public function __construct(Order $order, Voucher $voucher, Shop $shop, OrderShiping $orderShiping, OrderProduct $orderProduct)
    {
        $this->order = $order;
        $this->voucher = $voucher;
        $this->shop = $shop;
        $this->orderShiping = $orderShiping;
        $this->orderProducut = $orderProduct;
    }

    //get all order in database

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $orders = $this->order->getAll();
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


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    // viết view hiển thị danh sahcs order với các filter shop, voucher, order product
    public function getDetailOrder($id)
    {
        $products = $this->orderProducut->getProduct($id);
        $numberProduct = count($products);
        $order = $this->order->findOrder($id);
        $sumOrder = $this->orderProducut->sumOrder($id);
        return view('filter/order/order-detail',compact('products','numberProduct', 'order', 'sumOrder'));
    }



    // get oder

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrder($id)
    {
        try {
            $order = $this->order->findOrder($id);
            $voucher = $this->voucher->findVoucher($order->voucher_id);
            $shop = $this->shop->findShop($id);
            return response()->json([
                'code' => 200,
                'voucher' => $voucher->coupon,
                'shop' => $shop->name,
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

    /**
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->order->create($request->type, $request->find_user_code, $request->context, $request->note, $request->transport_fee, $request->discount, $request->status, $request->final_price, $request->reason, $request->cancel_by, $request->price, $request->voucher, $request->shop);
            $voucher = $this->voucher->getOrderVoucher($request->voucher);
            if ($voucher->quantity > 0) {
                $this->voucher->decrementVoucher($voucher);
                $this->orderShiping->createOrderShipping($request->shiping, $request->code, $request->from, $request->to, $request->id);
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

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $order = $this->order->findOrder($id);
            $orderShipings = $this->orderShiping->findOrderShiping($id);
            $orderProducts = $this->orderProducut->findOrder($id);
            foreach ($orderShipings as $orderShiping) {
                $this->orderShiping->deleteOrderShiping($orderShiping);
            }
            foreach ($orderProducts as $orderProduct) {
                $this->orderProducut->deleteOrderProduct($orderProduct);
            }
            $this->order->deleteOrder($order);
            DB::commit();
            return \response()->json([
                'code' => 200,
                'status' => "Deleted successfully!"
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

    public function update($id, UpdateRequest $request)
    {
        $this->order->update($id, $request->type, $request->find_user_code, $request->context, $request->note, $request->transport_fee, $request->discount, $request->status, $request->final_price, $request->reason, $request->cancel_by, $request->price, $request->voucher, $request->shop);
        return \response()->json([
            'code' => 200,
            'status' => 'updated successfully!'
        ]);
    }
}
