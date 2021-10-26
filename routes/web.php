<?php

use App\Brand;
use App\Origin;
use App\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// user : route
Route::get('/', function () {
    $products = \App\Product::all()->take(8);
    $brands = \App\Brand::all();
    return view('index',compact('products','brands'));
})->name('home');

//Route::get('/product', function () {
//    return view('products.product_detail');
//});

Route::get('/product_list', 'ProductController@productList')->name('product_list');

Route::get('/service', function () {
    return view('service.service');
});

Route::get('/about_us', function () {
    return view('service.about_us');
});

Route::get('/contact', function () {
    return view('service.contact');
});

Route::get('/user/account/profile', function () {
    $account = session()->get("current_account");
    return view('account', compact('account'));
})->name('profile');

Route::put('/user/account/profile_update/{id}', function (\Illuminate\Http\Request $request, $id) {
    dd($request);
})->name('account_update');

Route::get('/product/{slug}', 'ProductController@index')->name('product_detail');

Route::post('product/add_cart/item', 'ProductController@add_to_cart')->name('add_to_cart');

Route::get('/cart/page', 'ProductController@cart')->name('cart');

Route::get('/cart/page/{id}','ProductController@cart_remove')->name('cart_remove');

Route::get('/product_find','ProductController@search')->name('product_search');

Route::get('/male_product', 'ProductController@male_product')->name('male_product');

Route::get('/female_product', 'ProductController@female_product')->name('female_product');

Route::get('/unisex_product', 'ProductController@unisex_product')->name('unisex_product');

Route::get('/user/purchase', function () {
    $account = session()->get("current_account");
    return view('purchase',compact('account'));
})->name('mypurchase');

Route::get('/leave_review', function () {
    return view('leave_review');
});

Route::get('/confirm_review', function () {
    return view('confirm_review');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/faq', function () {
    return view('service.faq');
})->name('help');

Route::get('/faq_2', function () {
    return view('service.faq_2');
});

Route::get('/ordering_guide', function () {
    return view('service.ordering_guide');
});

Route::get('/mode_of_transportation', function () {
    return view('service.mode_of_transportation');
});

Route::get('/payment_methods', function () {
    return view('service.payment_methods');
});

Route::get('/policy', function () {
    return view('service.policy');
});

//mail
Route::get('/contact', 'SendEmailController@index');

Route::post('/contact/send', 'SendEmailController@send');

//Route::get('/product', 'ProductController@index');

// login - register : route
Route::get('login', 'AccountController@index')->name('login');
Route::post('registerProcess', 'AccountController@registerProgress')->name('registerP');
Route::post('loginProcess', 'AccountController@loginProgress')->name('loginP');
Route::post('/logoutaccount', 'AccountController@logOut')->name('logout');

// admin : route
Route::group(['middleware' => ['admin_check'], 'prefix' => 'admin'], function () {
    Route::get('/', function () {
        $male_product_amount   = count(Product::where('status', '=', '1')->where('sex', '=', 'Nam')->get());
        $female_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Nữ')->get());
        $unisex_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Phi giới tính')->get());
        $brands = Brand::all();
        $origins = Origin::all();
        return view('admin.index',compact('male_product_amount','female_product_amount','unisex_product_amount','brands','origins'));
    })->name('admin');
    Route::group(['prefix' => '/brands'], function () {
        Route::get('/', 'BrandController@index')->name('admin_brand');
        Route::get('/create', 'BrandController@create')->name('admin_brand_create');
        Route::post('/store', 'BrandController@store')->name('admin_brand_store');
        Route::get('/edit/{slug}', 'BrandController@edit')->name('admin_brand_edit');
        Route::put('/update/{id}', 'BrandController@update')->name('admin_brand_update');
        Route::put('/delete/{id}', 'BrandController@delete')->name('admin_brand_delete');
        Route::put('/deleteAll', 'BrandController@delete_multi')->name('admin_brand_delete_multi');
    });
    Route::group(['prefix' => '/origins'], function () {
        Route::get('/', 'OriginController@index')->name('admin_origin');
        Route::get('/create', 'OriginController@create')->name('admin_origin_create');
        Route::post('/store', 'OriginController@store')->name('admin_origin_store');
        Route::get('/edit/{slug}', 'OriginController@edit')->name('admin_origin_edit');
        Route::put('/update/{id}', 'OriginController@update')->name('admin_origin_update');
        Route::put('/delete/{id}', 'OriginController@delete')->name('admin_origin_delete');
        Route::put('/deleteAll', 'OriginController@delete_multi')->name('admin_origin_delete_multi');
    });
    Route::group(['prefix' => '/products'], function () {
        Route::get('/', 'ProductController@admin_index')->name('admin_product_list');
        Route::get('/create', 'ProductController@create')->name('admin_product_create');
        Route::post('/store', 'ProductController@store')->name('admin_product_store');
        Route::get('/edit/{slug}', 'ProductController@edit')->name('admin_product_edit');
        Route::put('/update/{id}', 'ProductController@update')->name('admin_product_update');
        Route::put('/delete/{id}', 'ProductController@delete')->name('admin_product_delete');
        Route::put('/deleteAll', 'ProductController@delete_multi')->name('admin_product_delete_multi');
    });
    Route::group(['prefix' => '/accounts'], function () {
        Route::get('/', 'AccountController@admin_index')->name('admin_account_list');
        Route::get('/create', 'AccountController@create')->name('admin_account_create');
        Route::post('/store', 'AccountController@store')->name('admin_account_store');
        Route::get('/edit/{slug}', 'AccountController@edit')->name('admin_account_edit');
        Route::put('/update/{id}', 'AccountController@update')->name('admin_account_update');
        Route::put('/delete/{id}', 'AccountController@delete')->name('admin_account_delete');
        Route::put('/deleteAll', 'AccountController@delete_multi')->name('admin_account_delete_multi');
    });
    Route::group(['prefix' => '/receipts'], function () {
        Route::get('/', 'ReceiptController@admin_index')->name('admin_receipt');
        Route::get('/create', 'ReceiptController@create')->name('admin_receipt_create');
        Route::post('/store', 'ReceiptController@store')->name('admin_receipt_store');
        Route::get('/edit/{id}', 'ReceiptController@edit')->name('admin_receipt_edit');
        Route::put('/update/{id}', 'ReceiptController@update')->name('admin_receipt_update');
        Route::put('/delete/{id}', 'ReceiptController@delete')->name('admin_receipt_delete');
        Route::put('/deleteAll', 'ReceiptController@delete_multi')->name('admin_receipt_delete_multi');
    });
    Route::get('/demo_table', function () {
        return view('admin.tables_datatable');
    });
});

// test : route
Route::get('checking_page', function () {
    return view('session_checking');
});
Route::get('/test/{haha}', function () {
    return 'haha';
});
Route::get('/multi_delete', function () {
    $products = \App\Product::all()->where('status', '=', '1');
    return view('test_multi_delete', compact('products'));
});
Route::get('/multi_delete2', function () {
    $products = \App\Product::all()->where('status', '=', '1');
    return view('test_multi_delete', compact('products'));
});
Route::post('/multi_delete_action', function (Illuminate\Http\Request $request) {
    $products_array = $request->products_id;
//    dd($products_array);
    //check product con ton` tai hay khong
    dd(\App\Product::whereIn('id', $request['products_id'])->update(['status' => 0]));
})->name('multi_delete_action');


