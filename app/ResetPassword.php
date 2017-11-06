<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    //

    public static function GenerateRID()
    {
        $tid = str_random(255);
        $t = ResetPassword::where(['token' => $tid])->first();
        if($t == null || count($t) < 1)
            return $tid;
        else
            self::GenerateRID();
    }

    public static function FindByToken($token)
    {
        $t = ResetPassword::where(['token' => $token, 'used' => false])->orderByDesc('created_at')->first();
        return $t;
    }
}
