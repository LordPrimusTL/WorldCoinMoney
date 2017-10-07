<?php
/**
 * Created by PhpStorm.
 * User: LordPrimus
 * Date: 10/4/2017
 * Time: 11:28 PM
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    public static function AuthUserCheck()
    {
        if(Auth::check() && Auth::user()->role_id == 3 && Auth::user()->is_active)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public static function AuthAdminCheck()
    {
        if(Auth::check() && Auth::user()->role_id < 3 && Auth::user()->is_active)
        {
            return true;
        }
        else{
            return false;
        }
    }
}