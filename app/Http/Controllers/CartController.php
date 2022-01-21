<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use App\Product;
use App\Receipt;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Spatie\ResponseCache\Facades\ResponseCache;

class CartController extends Controller
{

    //section View
    public function index(): Factory|\Illuminate\Contracts\View\View|Application
    {
        return view('pages.cart.index');
    }

    //section Store
    public function payment(Request $request)
    {
        $cart = session()->get('shoppingCart');
        $account = auth()->user();

        if ($cart !== null)
        {
            // Validate shipment info
            $attributes = $request->validate([
                'ship_name'    => 'required|max:255|min:3',
                'phone'        => 'required|max:13',
                'name_address' => 'required|max:255',
                'note'         => 'max:255',
            ]);

            $attributes['total_money'] = get_cart_total_price() ?? 0;
            $attributes['account_id'] = $account->id;
            if (is_null($attributes['note'])) $attributes['note'] = 'No note';
            $attributes['status'] = '0';

            // Add new receipt
            $receipt = Receipt::create($attributes);

            // Add order detail to the above receipt
            foreach ($cart as $product_id => $volumes)
            {
                $product = Product::find($product_id);

                foreach ($volumes as $volume => $volume_detail)
                {
                    $order_detail = [];

                    $order_detail['receipt_id'] = $receipt->id;
                    $order_detail['account_id'] = $account->id;
                    $order_detail['product_id'] = $product_id;
                    $order_detail['volume'] = $volume;
                    $order_detail['quantity'] = $volume_detail['quantity'];
                    $order_detail['price'] = order_price($product->price, $volume, $volume_detail['quantity']);

                    OrderDetail::create($order_detail);
                }
            }

            // Clear shopping cart
            session()->forget('shoppingCart');

            return redirect()->route('mypurchase');
        }
    }

    //section Add
    public function add(Request $request): View|Factory|JsonResponse|Application
    {

        $id = $request->id;
        $quantity = $request->quantity;
        $volume = $request->volume;

        // kiểm tra sản phẩm theo id truyền lên.
        $product = Product::where('status', '=', '1')->find($id);

        if ($product === null)
        {
            return view('404');
        }

        // lấy thông tin giỏ hàng từ trong session.
        $shopping_cart = Session::get('shoppingCart');

        if ($shopping_cart === null)
        {
            // thì tạo mới giỏ hàng là một mảng các key và value
            $shopping_cart = array(); // key và value
        }

        // Generate cart item
        $cartItem = $shopping_cart[$id] ?? null;

        // nếu không, tạo mới một cart item.
        if ($cartItem === null)
        {
            $cartItem[$volume]['quantity'] = $quantity;
        }
        else
            if (array_key_exists($volume, $shopping_cart[$id]))
            {
                $cartItem[$volume]['quantity'] += $quantity;
            }
            else
            {
                $cartItem[$volume]['quantity'] = $quantity;
            }

        // Generate each cart item's cost
        $order_price = order_price($product->price, $volume, $cartItem[$volume]['quantity']);
        $subprice = format_money($order_price);
        $cartItem[$volume]['subprice'] = $subprice;

        // Add cart item to session
        $shopping_cart[$id] = $cartItem;
        Session::put('shoppingCart', $shopping_cart);
        $request->session()->save();

        // Remove cache to reset cart item dropdown view
        ResponseCache::clear();

        $cart_item_count = array_sum(array_map('count', $shopping_cart));

        $updated_dropdown_cart = view('layouts._dropdown_cart')->render();

        return response()->json([
            'success'               => "Sản phẩm đã được thêm vào giỏ hàng.",
            "cart_item_count"       => $cart_item_count,
            'updated_dropdown_cart' => $updated_dropdown_cart
        ]);
    }

    //section Update

    /**
     * @throws JsonException
     */
    public function update(Request $request): JsonResponse
    {
        // Convert from json to associative array then replace current cart in session
        $parsed_data = json_decode($request->shoppingCart, true, 512, JSON_THROW_ON_ERROR);

        // Filter out invalid item
        foreach ($parsed_data as $product_id => $item)
        {
            // Remove item with no volume (is deleted from front-end)
            if (empty($item))
            {
                unset($parsed_data[$product_id]);
                continue;
            }

            foreach ($item as $volume => $volume_detail)
            {
                // Remove item with invalid quantity
                $quantity = $volume_detail['quantity'];
                if (!is_numeric($quantity) || $quantity === 0)
                {
                    unset($parsed_data[$product_id][$volume]);
                }
            }
        }

        session()->put('shoppingCart', $parsed_data);

        // Update subprice of each item in the cart
        $ship_fee = 200000.0;
        $cart = update_cart_item_price();
        $cart['total_price'] = format_money(get_cart_total_price() + $ship_fee);
        $cart['price_no_ship'] = format_money(get_cart_total_price());

        // Remove cache
        ResponseCache::forget(route('cart'));

        return response()->json(['success' => $cart]);
    }


    //section Remove
    public function remove(Request $request): RedirectResponse
    {
        $id = request('id');
        $volume = request('volume');

        $cart = Session::get('shoppingCart');

        if (array_key_exists($id, $cart))
        {
            if (array_key_exists($volume, $cart[$id]))
            {
                unset($cart[$id][$volume]);
            }

            if (empty($cart[$id]))
            {
                unset($cart[$request->id]);
            }
        }

        Session::put('shoppingCart', $cart);

        // Remove cache
        ResponseCache::clear();

        return redirect()->back()->with(['success' => 'Đã xóa sản phẩm thành công.']);
    }

}
