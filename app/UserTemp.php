<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTemp extends Model
{
    //
    public static function GenerateUUID()
    {
        $tid = str_random(255);
        $t = UserTemp::where(['token' => $tid])->first();
        if($t == null || count($t) < 1)
            return $tid;
        else
            self::GenerateUUID();
    }
}
