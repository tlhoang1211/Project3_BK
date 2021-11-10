<?php

namespace App\Http\Controllers;

use App\Account;

class UserController extends Controller
{
    public function orderList()
    {
        $account = session()->get("current_account");
        $receipts = Account::find($account->id)->receipts;

        return view('purchase', compact('account', 'receipts'));
    }
}
