<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcctReq extends Model
{
    //
    public static function FindByID($id)
    {
        $a = AcctReq::where(['user_id' => $id, 'resolved' => 0])->first();
        if($a == null || empty($a))
        {
            return false;
        }
        else{
            return true;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
