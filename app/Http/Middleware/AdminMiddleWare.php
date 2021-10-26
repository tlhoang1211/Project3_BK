<?php

namespace App\Http\Middleware;

use App\Account;
use Closure;

class AdminMiddleWare
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
        $current_account = session('current_account');
//        $account = Account::first();
//        dd("132");
//        dd($current_account);
//        dd($current_account->roles);
        if (isset($current_account)){
            foreach ($current_account->roles as $role){
                if ($role->name == 'admin'){
                    return $next($request);
                }
            }
        }
        return redirect('/');
    }
}
