<?php

namespace App;

use App\Helpers\Logger;
use App\Helpers\TradeSync;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class MainAccount extends Model
{

    //
    private static function getLogger()
    {
        return new Logger();
    }

    public static function updateTradeBal($user_id, $amount)
    {
         $m = MainAccount::where(['user_id' => $user_id])->first();
        try{
            if($m == null || count($m) < 1)
            {
                $mm = new MainAccount();
                $mm->user_id = $user_id;
                $mm->trade_bal = $amount;
                $mm->ref_bal = 0;
                $mm->save();
                Log::info('Account Balance Updated',['account' => $mm]);
                return $mm;
            }
            else{
                $m->trade_bal = $m -> trade_bal + $amount;
                $m->save();
                Log::info('Account Balance Updated',['account' => $m]);
                return $m;
            }
        }
        catch (\Exception $ex)
        {
            self::getLogger()->LogError("Error occurred in account updating", $ex, ['m' => $m]);
        }
    }
    public static function updateRefBal($user_id, $amount)
    {
         $m = MainAccount::where(['user_id' => $user_id])->first();
        try{
            if($m == null || count($m) < 1)
            {
                $mm = new MainAccount();
                $mm->user_id = $user_id;
                $mm->trade_bal =0;
                $mm->ref_bal = $amount;
                $mm->save();
                Log::info('Account Balance Updated',['account' => $mm]);
                return true;
            }
            else{
                $m->ref_bal = $m->ref_bal + $amount;
                $m->save();
                Log::info('Account Balance Updated',['account' => $m]);
                return true;
            }
        }
        catch (\Exception $ex)
        {
            self::getLogger()->LogError("Error occurred in account updating", $ex, ['m' => $m]);
            return false;
        }
    }
}
