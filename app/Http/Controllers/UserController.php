<?php

namespace App\Http\Controllers;

use App\Product;

class UserController extends Controller
{
    public function orderList()
    {
        $account = session()->get("current_account");
        $receipts = $account->receipts;
//            ->map(function ($receipt, $key) {
//            $receipt->orders->map(function ($order, $key) {
//                return [
//                    'name'     => Product::find($order->product_id)->name,
//                    'volume'   => $order->volume,
//                    'quantity' => $order->quantity,
//                    'price'    => $order->price,
//                    'date'     => $order->created_at,
//                ];
//            })
//        });
        return view('purchase', compact('account', 'receipts'));
    }
}
