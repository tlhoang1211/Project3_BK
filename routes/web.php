<?php

use App\Brand;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;
use App\Origin;
use App\Product;
use Illuminate\Support\Facades\Route;

Route::middleware('doNotCacheResponse')->group(function () {

    //section  Home
    Route::get('/', [HomePageController::class, 'index'])->name('home');

    //==================================================================================================================

    Route::get('/service', static fn() => view('service.service'));
    Route::get('/about_us', static fn() => view('service.about_us'));
    Route::get('/contact', static fn() => view('service.contact'));

    //==================================================================================================================

    //section User
    Route::prefix('account')->group(function () {

        Route::get('/profile', static function () {
            $account = auth()->user();
            return view('account', compact('account'));
        })->name('profile')->middleware('auth');

        Route::put('/update', [AccountController::class, 'user_update'])
            ->name('user_account_update')->middleware('auth');

        Route::get('/receipts', 'UserController@orderList')->name('mypurchase')->middleware('auth');
    });

    //==================================================================================================================

    //section Product
    Route::prefix('product')->group(function () {

        Route::get('/list', 'ProductController@productList')->name('product_list');

        Route::get('/find', 'ProductController@search')->name('product_search');

        Route::get('/{product:slug}', 'ProductController@index')->name('product_detail');

        Route::post('{product:slug}/comment', 'ProductController@productComment')->name('comment')->middleware('auth');

    });

    //==================================================================================================================

    //section Cart
    Route::prefix('cart')->group(function () {

        Route::post('/add', 'CartController@add')->name('add_to_cart');

        Route::post('/new/receipt', 'CartController@payment')->name('new_receipt')->middleware('auth');

        Route::post('/update', 'CartController@update')->name('cart_update');

        Route::get('/page', 'CartController@index')->name('cart');

        Route::delete('/remove', 'CartController@remove')->name('cart_remove');

    });

    //==================================================================================================================

    Route::get('/leave_review', static fn() => view('leave_review'));

    Route::get('/confirm_review', static fn() => view('confirm_review'));

    Route::get('/blog', static fn() => view('blog'));

    Route::get('/faq', static fn() => view('service.faq'))->name('help');

    Route::get('/faq_2', static fn() => view('service.faq_2'));

    Route::get('/ordering_guide', static fn() => view('service.ordering_guide'));

    Route::get('/mode_of_transportation', static fn() => view('service.mode_of_transportation'));

    Route::get('/payment_methods', static fn() => view('service.payment_methods'));

    Route::get('/policy', static fn() => view('service.policy'));

    //mail
    Route::get('/contact', 'SendEmailController@index');
    Route::post('/contact/send', 'SendEmailController@send');

    //==================================================================================================================

    //section  Login - Register :
    Route::prefix('login')->middleware('doNotCacheResponse')->group(function () {

        Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');

        Route::post('/process', [LoginController::class, 'login'])->name('loginP')->middleware('guest');

        // Google login
        Route::get('/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('login.google');
        Route::get('/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('login.google-callback');

        // Facebook login
        Route::get('/facebook/redirect', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
        Route::get('/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->name('login.facebook-callback');

    });

    //==================================================================================================================

    //section  Admin
    Route::group(['middleware' => ['admin_check'], 'prefix' => 'admin'], static function () {
        Route::get('/', static function () {
            $male_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Nam')->get());
            $female_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Nữ')->get());
            $unisex_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Phi giới tính')->get());
            $brands = Brand::all();
            $origins = Origin::all();
            return view('admin.index', compact('male_product_amount', 'female_product_amount', 'unisex_product_amount', 'brands', 'origins'));
        })->name('admin');
        Route::group(['prefix' => '/brands'], static function () {
            Route::get('/', 'BrandController@index')->name('admin_brand');
            Route::get('/create', 'BrandController@create')->name('admin_brand_create');
            Route::post('/store', 'BrandController@store')->name('admin_brand_store');
            Route::get('/edit/{slug}', 'BrandController@edit')->name('admin_brand_edit');
            Route::put('/update/{id}', 'BrandController@update')->name('admin_brand_update');
            Route::put('/delete/{id}', 'BrandController@delete')->name('admin_brand_delete');
            Route::put('/deleteAll', 'BrandController@delete_multi')->name('admin_brand_delete_multi');
        });
        Route::group(['prefix' => '/origins'], static function () {
            Route::get('/', 'OriginController@index')->name('admin_origin');
            Route::get('/create', 'OriginController@create')->name('admin_origin_create');
            Route::post('/store', 'OriginController@store')->name('admin_origin_store');
            Route::get('/edit/{slug}', 'OriginController@edit')->name('admin_origin_edit');
            Route::put('/update/{id}', 'OriginController@update')->name('admin_origin_update');
            Route::put('/delete/{id}', 'OriginController@delete')->name('admin_origin_delete');
            Route::put('/deleteAll', 'OriginController@delete_multi')->name('admin_origin_delete_multi');
        });
        Route::group(['prefix' => '/products'], static function () {
            Route::get('/', 'ProductController@admin_index')->name('admin_product_list');
            Route::get('/create', 'ProductController@create')->name('admin_product_create');
            Route::post('/store', 'ProductController@store')->name('admin_product_store');
            Route::get('/edit/{slug}', 'ProductController@edit')->name('admin_product_edit');
            Route::put('/update/{id}', 'ProductController@update')->name('admin_product_update');
            Route::put('/delete/{id}', 'ProductController@delete')->name('admin_product_delete');
            Route::put('/deleteAll', 'ProductController@delete_multi')->name('admin_product_delete_multi');
        });
        Route::group(['prefix' => '/accounts'], static function () {
            Route::get('/', 'AccountController@admin_index')->name('admin_account_list');
            Route::get('/create', 'AccountController@create')->name('admin_account_create');
            Route::post('/store', 'AccountController@store')->name('admin_account_store');
            Route::get('/edit/{slug}', 'AccountController@edit')->name('admin_account_edit');
            Route::put('/update/{id}', 'AccountController@update')->name('admin_account_update');
            Route::put('/delete/{id}', 'AccountController@delete')->name('admin_account_delete');
            Route::put('/deleteAll', 'AccountController@delete_multi')->name('admin_account_delete_multi');
        });
        Route::group(['prefix' => '/receipts'], static function () {
            Route::get('/', 'ReceiptController@admin_index')->name('admin_receipt');
            Route::get('/create', 'ReceiptController@create')->name('admin_receipt_create');
            Route::post('/store', 'ReceiptController@store')->name('admin_receipt_store');
            Route::get('/edit/{id}', 'ReceiptController@edit')->name('admin_receipt_edit');
            Route::put('/update/{id}', 'ReceiptController@update')->name('admin_receipt_update');
            Route::put('/delete/{id}', 'ReceiptController@delete')->name('admin_receipt_delete');
            Route::put('/deleteAll', 'ReceiptController@delete_multi')->name('admin_receipt_delete_multi');
        });
        Route::get('/demo_table', static fn() => view('admin.tables_datatable'));
    });

    //==================================================================================================================

    //section  Test
    Route::get('test', static function () {
        return view('test', ['var' => session('shoppingCart')]);
    });

    Route::get('/multi_delete', static function () {
        $products = Product::all()->where('status', '=', '1');
        return view('test_multi_delete', compact('products'));
    });
    Route::get('/multi_delete2', static function () {
        $products = Product::all()->where('status', '=', '1');
        return view('test_multi_delete', compact('products'));
    });

    //==================================================================================================================
});
