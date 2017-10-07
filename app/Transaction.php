<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    public static function GenerateTID()
    {
        $tid = str_random(20);
        $t = Transaction::where(['t_id' => $tid])->first();
        if($t == null || count($t) < 1)
            return $tid;
        else
            self::GenerateTID();
    }
}
