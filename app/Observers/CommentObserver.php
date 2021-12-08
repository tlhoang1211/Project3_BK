<?php

namespace App\Observers;

use App\Comment;
use Spatie\ResponseCache\Facades\ResponseCache;

class CommentObserver
{
    public function created(Comment $comment)
    {
        $this->remove_product_page_cache($comment);
    }

    private function remove_product_page_cache(Comment $comment): void
    {
        ResponseCache::forget([
            route('product_detail', $comment->product->slug),
            route('product_detail', ['product' => $comment->product, 'page' => 1])
        ]);
    }

    public function updated(Comment $comment)
    {
        $this->remove_product_page_cache($comment);
    }

    public function deleted(Comment $comment)
    {
        $this->remove_product_page_cache($comment);
    }
}
