<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TType extends Model
{
    //
    public function trans()
    {
        return $this->hasMany(Transaction::class,'t_type');
    }
}
