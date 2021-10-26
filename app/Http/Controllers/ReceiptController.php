<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use App\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function admin_index(Request $request)
    {
        $receipts = Receipt::paginate(5);
        $orders = OrderDetail::paginate(5);
        return view('admin.receipts.receipt_list',compact('receipts','orders'));
    }
}
