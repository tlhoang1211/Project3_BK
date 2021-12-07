<?php

namespace App\Http\Controllers;

use App\Receipt;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class UserController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function orderList(): Factory|View|Application
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
