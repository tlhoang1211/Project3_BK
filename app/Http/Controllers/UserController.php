<?php

namespace App\Http\Controllers;

use App\Receipt;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * @throws Exception
     */
    public function orderList(): Factory|View|Application
    {
        $account = auth()->user();
        $receipts = Receipt::where("account_id", $account->id)->latest()->paginate(5);

        return view('purchase', compact('account', 'receipts'));
    }
}
