<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    //
    public static function FindRefLink($referrer,$referred)
    {
        $rf = Referral::where(['referrer' => $referrer,'referred' => $referred])->first();
        dd($rf);
        return $rf->ref_link;
    }
    public static function FindReferrals($id)
    {
        return Referral::where(['referrer'=>$id])->get();
    }

    public static function FindByUserAndReferrer($id,$referrer)
    {
        $data = Referral::where(['referred' => $id, 'referrer' => $referrer])->first();
        return $data;
    }
}
