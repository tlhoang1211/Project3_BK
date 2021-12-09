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
        $receipts = Receipt::latest()->where("account_id", $account->id)->paginate(5);

        // Save receipts pagination URLS to session
        session(["receipt-page-urls" => $receipts->getUrlRange(1, $receipts->lastPage())]);

        return view('purchase', compact('account', 'receipts'));
    }
}
