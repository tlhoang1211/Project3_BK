<?php

namespace App\Observers;

use Spatie\ResponseCache\Facades\ResponseCache;

class ReceiptObserver
{
    public function created(): void
    {
        $this->remove_receipt_page_cache();
    }

    private function remove_receipt_page_cache(): void
    {
        ResponseCache::forget([
            route('mypurchase'),
            route('mypurchase', ['page' => 1])
        ]);
    }

    public function updated(): void
    {
        $this->remove_receipt_page_cache();
    }

    public function deleted(): void
    {
        $this->remove_receipt_page_cache();
    }
}
