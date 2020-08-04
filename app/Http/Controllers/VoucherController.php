<?php

namespace App\Http\Controllers;

use App\Order;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{

    //get all voucher
    public function index()
    {
        try {
            $vouchers = Voucher::all();
            return response()->json([
                'code' => 200,
                'data' => $vouchers
            ]);
        } catch (\Exception $exception){
            return response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }

    // get order using voucher
    public function voucher($voucher_id)
    {
        try {
            $vouchers = Voucher::where('voucher_id',$voucher_id)->get();
            return response()->json([
                'code' => 200,
                'data' => $vouchers
            ]);
        } catch (\Exception $exception){
            return response()->json([
                'code' => $exception->getCode(),
                'status' => $exception->getMessage()
            ]);
        }
    }
}
