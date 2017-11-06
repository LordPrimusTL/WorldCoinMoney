<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Btc extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class,'email', 'email');
    }
}
