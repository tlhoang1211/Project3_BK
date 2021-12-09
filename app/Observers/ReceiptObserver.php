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
        $receipt_urls = [];
        // Get all pagination pages
        if (session()->has('receipt-page-urls'))
        {
            $receipt_urls = session('receipt-page-urls');
        }

        ResponseCache::forget([
            route('mypurchase'),
            ...$receipt_urls
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
