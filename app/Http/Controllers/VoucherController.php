<?php

namespace App\Http\Controllers;

use App\Order;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    protected $voucher;
    protected $order;

    public function __construct(Voucher $voucher, Order $order)
    {
        $this->voucher = $voucher;
        $this->order = $order;
    }

    //get all voucher

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $vouchers = $this->voucher->getAll();
            return view('filter/voucher/voucher', compact('vouchers'));
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
    public function getOrderVoucher($id)
    {
        $voucher = $this->voucher->findVoucher($id);
        $orders = $this->order->getOrderVoucher($voucher->id);
        $number = count($orders);

        return view('filter/voucher/voucher-order', compact('voucher', 'orders', 'number'));
    }
}
