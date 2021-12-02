<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $current_account = auth()->user();

        if (isset($current_account) && $current_account->role->name === 'admin')
        {
            return $next($request);
        }
        return redirect('/');
    }
}
