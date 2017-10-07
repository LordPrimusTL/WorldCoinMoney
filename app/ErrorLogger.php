<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorLogger extends Model
{
    public static function findByT_ID($t_id)
    {
        $checkTid = ErrorLogger::where(['error_id' => $t_id])->get();
        if(count($checkTid) > 0)
        {
            return false;
        }
        else{
            return true;
        }
    }
}
