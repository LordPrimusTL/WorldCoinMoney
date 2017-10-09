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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ttype()
    {
        return $this->belongsTo(TType::class,'t_type');
    }
    public function stat()
    {
        return $this->belongsTo(TStatus::class,'ts_id');
    }

    public function withd()
    {
        return $this->hasOne(Withdrawal::class,'t_id');
    }

    public function tname()
    {
        return $this->belongsTo(TName::class,'tn_id');
    }
}
