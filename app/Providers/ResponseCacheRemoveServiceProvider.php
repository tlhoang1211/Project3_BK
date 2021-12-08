<?php

namespace App\Providers;

use App\Comment;
use App\Receipt;
use Illuminate\Support\ServiceProvider;
use Spatie\ResponseCache\Facades\ResponseCache;

class ResponseCacheRemoveServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot(): void
    {
        // Remove /product/{product:slug} page cache on Comment created, update, deleted
        Comment::created(function ($model) {
            ResponseCache::forget(route('product_detail', $model->product->slug));
        });

        Comment::updated(function ($model) {
            ResponseCache::forget(route('product_detail', $model->product->slug));
        });

        Comment::deleted(function ($model) {
            ResponseCache::forget(route('product_detail', $model->product->slug));
        });

        // Remove /user/purchase page on Receipt created, update, deleted
        Receipt::created(function () {
            ResponseCache::forget(route(route('mypurchase')));
        });

        Receipt::updated(function () {
            ResponseCache::forget(route(route('mypurchase')));
        });

        Receipt::deleted(function () {
            ResponseCache::forget(route(route('mypurchase')));
        });

    }
}
