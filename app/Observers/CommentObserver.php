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
        // Get all pagination pages
        $comment_pages = [];
        if (session()->has("comment-page-urls-{$comment->product->id}"))
        {
            $comment_pages = session("comment-page-urls-{$comment->product->id}");
        }

        ResponseCache::forget([
            route('product_detail', $comment->product->slug),
            ...$comment_pages
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
