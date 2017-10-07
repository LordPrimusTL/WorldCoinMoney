<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investments extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //
    public static function FindbyInv($inv_id)
    {
        $i = Investments::where(['inv_id' => $inv_id])->first();
        if($i==null || count($i) < 1)
            return false;
        else
            return true;
    }

    public static function FindbyInvD($inv_id)
    {
        $i = Investments::where(['inv_id' => $inv_id])->first();
        if($i==null || count($i) < 1)
            return null;
        else
            return $i;
    }

    public function status()
    {
        return $this->belongsTo(TStatus::class,'ts_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
