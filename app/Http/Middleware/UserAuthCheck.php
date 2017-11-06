<?php

namespace App\Http\Middleware;

use App\Helpers\AuthCheck;
use Closure;

class UserAuthCheck
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
        if(AuthCheck::AuthUserCheck())
        {
            //dd('Checked');
            return $next($request);
        }
        else{
            //dd('Not');
            Log::info('User with admin right and ID ' . Auth::id() . 'tried to acces a user profile');
            Auth::logout();
            return redirect()->action('UtilityController@Home');
        }
    }
}
