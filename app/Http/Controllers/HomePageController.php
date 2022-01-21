<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomePageController extends Controller
{
    public function index(): Factory|View|Application
    {
        $products_female = Product::all()->where('sex', 'Nữ')->sortByDesc('rate')->take(4);
        $products_male = Product::all()->where('sex', 'Nam')->sortByDesc('rate')->take(4);
        $products_unisex = Product::all()->where('sex', 'Phi giới tính')->sortByDesc('rate')->take(4);
        $brands = Brand::all();

        return view('pages.home.index',
            compact('products_female', 'products_male', 'products_unisex', 'brands'));
    }
}
