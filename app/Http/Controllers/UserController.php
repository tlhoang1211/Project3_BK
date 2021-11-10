<?php

namespace App\Http\Controllers;

use App\Receipt;

class UserController extends Controller
{
    public function orderList()
    {
        $account = session()->get("current_account");

        // Using $account->receipts doesn't make the query to database to get the latest receipts
        $receipts = Receipt::where("account_id", $account->id)->latest()->paginate(5);

        return view('purchase', compact('account', 'receipts'));
    }
}
