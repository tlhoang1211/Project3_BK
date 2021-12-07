<?php

namespace App\Http\Controllers;

use App\Receipt;
use Cache;
use Exception;

class UserController extends Controller
{
    /**
     * @throws Exception
     */
    public function orderList()
    {
        $account = cache()->remember('account', now()->addDay(), function () {
            return auth()->user();
        });

        $currentPage = request()->get('page', 1);
        $receipts = cache()->remember('receipts-page-' . $currentPage, now()->addDay(),
            function () use ($account) {
                return Receipt::where("account_id", $account->id)
                    ->latest()->paginate(5);
            });

        return view('purchase', compact('account', 'receipts'));
    }
}
