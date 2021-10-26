<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class GuestMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $account['roles']= 'new';
//        Session::put('current_account', $account);
//        $account_session = session_start();
//        $account_session->put($account);
        return $next($request);
    }
}
