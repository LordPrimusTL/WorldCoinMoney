<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    public static function GenerateWID()
    {
        $tid = str_random(20);
        $t = Withdrawal::where(['w_id' => $tid])->first();
        if($t == null || count($t) < 1)
            return $tid;
        else
            self::GenerateWID();
    }

    public function trans()
    {
        return $this->belongsTo(Transaction::class,'t_id');
    }

    public function status()
    {
        return $this->belongsTo(TStatus::class,'ts_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
