<?php

namespace App\Observers;

use App\Account;
use Spatie\ResponseCache\Facades\ResponseCache;

class AccountObserver
{
    public function updated(Account $account)
    {
        $this->remove_profile_page_cache($account);
    }

    private function remove_profile_page_cache(Account $account): void
    {
        ResponseCache::forget(route('profile'));

        // To update empty cart page background GIF which base on sex
        if ($account->isDirty('sex'))
        {
            ResponseCache::forget(route('cart'));
        }
    }

    public function saved(Account $account)
    {
        $this->remove_profile_page_cache($account);
    }
}
