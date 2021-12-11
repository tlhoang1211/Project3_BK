<?php

use App\Brand;
use App\Comment;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Origin;
use App\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::all()->sortByDesc('rate')->take(12);
    $brands = Brand::all();
    return view('index', compact('products', 'brands'));
})->name('home');

//==================================================================================================================

Route::get('/service', fn() => view('service.service'));
Route::get('/about_us', fn() => view('service.about_us'));
Route::get('/contact', fn() => view('service.contact'));

//==================================================================================================================

//User routes
Route::prefix('account')->group(function () {

    Route::get('/profile', function () {
        $account = auth()->user();
        return view('account', compact('account'));
    })->name('profile')->middleware('auth');

    Route::put('/update', [AccountController::class, 'user_update'])
        ->name('user_account_update')->middleware('auth');

    Route::get('/receipts', 'UserController@orderList')->name('mypurchase')->middleware('auth');
});

//==================================================================================================================

//Product routes
Route::prefix('product')->group(function () {

    Route::get('/list', 'ProductController@productList')->name('product_list');

    Route::get('/find', 'ProductController@search')->name('product_search');

    Route::get('/male', 'ProductController@male_product')->name('male_product');

    Route::get('/female', [ProductController::class, 'female_product'])->name('female_product');

    Route::get('/unisex', 'ProductController@unisex_product')->name('unisex_product');

    Route::post('/add_cart/item', 'ProductController@add_to_cart')->name('add_to_cart');

    Route::get('/{product:slug}', 'ProductController@index')->name('product_detail');

    Route::post('{product:slug}/comment', 'ProductController@productComment')->name('comment')->middleware('auth');

});

//==================================================================================================================

//Cart routes
Route::prefix('cart')->group(function () {

    Route::post('/new/receipt', 'ProductController@cart_store')->name('new_receipt')->middleware('auth');

    Route::post('/update', 'ProductController@cart_update')->name('cart_update');

    Route::get('/page', 'ProductController@cart')->name('cart');

    Route::get('/page/{id}', 'ProductController@cart_remove')->name('cart_remove');

});

//==================================================================================================================

Route::get('/leave_review', fn() => view('leave_review'));

Route::get('/confirm_review', fn() => view('confirm_review'));

Route::get('/blog', fn() => view('blog'));

Route::get('/faq', fn() => view('service.faq'))->name('help');

Route::get('/faq_2', fn() => view('service.faq_2'));

Route::get('/ordering_guide', fn() => view('service.ordering_guide'));

Route::get('/mode_of_transportation', fn() => view('service.mode_of_transportation'));

Route::get('/payment_methods', fn() => view('service.payment_methods'));

Route::get('/policy', fn() => view('service.policy'));

//mail
Route::get('/contact', 'SendEmailController@index');
Route::post('/contact/send', 'SendEmailController@send');

//==================================================================================================================

// login - register : route
Route::prefix('login')->middleware('doNotCacheResponse')->group(function () {

    Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');

    Route::post('/process', [LoginController::class, 'login'])->name('loginP')->middleware('guest');

    // Google login
    Route::get('google/redirect', [LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('login.google-callback');

    // Facebook login
    Route::get('facebook/redirect', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->name('login.facebook-callback');

});


//==================================================================================================================

// admin : route
Route::group(['middleware' => ['admin_check'], 'prefix' => 'admin'], function () {
    Route::get('/', function () {
        $male_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Nam')->get());
        $female_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Nữ')->get());
        $unisex_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Phi giới tính')->get());
        $brands = Brand::all();
        $origins = Origin::all();
        return view('admin.index', compact('male_product_amount', 'female_product_amount', 'unisex_product_amount', 'brands', 'origins'));
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
    Route::get('/demo_table', fn() => view('admin.tables_datatable'));
});

//==================================================================================================================

// test : route
Route::get('test', function () {
    $pagination = Comment::where('product_id', '1')->paginate(5);
    $result = $pagination->lastPage;
    dd('something');
    return view('test');
});

Route::get('checking_page', function () {
    $pagination = Comment::where('product_id', '1')->paginate(5);
    $result = $pagination->lastPage;
    return view('session_checking');
});

Route::get('/multi_delete', function () {
    $products = Product::all()->where('status', '=', '1');
    return view('test_multi_delete', compact('products'));
});
Route::get('/multi_delete2', function () {
    $products = Product::all()->where('status', '=', '1');
    return view('test_multi_delete', compact('products'));
});
Route::post('/multi_delete_action', function (Illuminate\Http\Request $request) {
    $products_array = $request->products_id;
    //    dd($products_array);
    //check product con ton` tai hay khong
    dd(Product::whereIn('id', $request['products_id'])->update(['status' => 0]));
})->name('multi_delete_action');

//==================================================================================================================
