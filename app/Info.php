<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public static function updateMessage($msg_id)
    {
        $u = Info::find($msg_id);
        $u->read_count++;
        $u->save();
    }
}
