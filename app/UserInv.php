<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInv extends Model
{
    //

    public static function findByID($id)
    {
        $u = UserInv::where(['user_id' => $id])->first();
        if($u == null || count($u) < 1)
        {
            return false;
        }
        else{
            return true;
        }
    }

    public static function dataS($user_id, $values)
    {
        $u = new UserInv();
        $u->user_id = $user_id;
        $u->gb = $values;
        $u->save();
    }

    //UserInv -> user has given bonus

}
