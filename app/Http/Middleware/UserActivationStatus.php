<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserActivationStatus
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
        if(Auth::user()->activated == false)
        {
            Session::flash('error','Please contact the administrator(info@worldcoin.com) as your account is not yet activated');
            return redirect()->back();
        }
        return $next($request);
    }
}
