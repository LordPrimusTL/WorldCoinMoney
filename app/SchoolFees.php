<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolFees extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class,'email', 'email');
    }
}
