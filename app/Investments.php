<?php

namespace App;

use App\Helpers\Logger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Investments extends Model
{
    use SoftDeletes;
    private static function getLogger()
    {
        return new Logger();
    }
    protected $dates = ['deleted_at'];
    //
    public static function FindbyInv($inv_id)
    {
        $i = Investments::where(['inv_id' => $inv_id])->first();
        if($i==null || count($i) < 1)
            return false;
        else
            return true;
    }

    public static function FindbyInvD($inv_id)
    {
        $i = Investments::where(['inv_id' => $inv_id])->first();
        if($i==null || count($i) < 1)
            return null;
        else
            return $i;
    }

    public function status()
    {
        return $this->belongsTo(TStatus::class,'ts_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public static function ReferralBonusStudent($i, $amount)
    {
        //dd($i);
        $m_user = User::find($i->user_id);
        //dd($m_user);
        try{
            $tr = new Transaction();
            $tr->t_id = Transaction::GenerateTID();
            $tr->user_id = $m_user->referrer_id;
            $tr->amount = (5/100) * $amount;
            $tr->descn = 'Investment One Time Bonus - ' . $i->inv_id;
            $tr->tn_id = 6;
            $tr->t_type = 1;
            $tr->ts_id = 1;
            $tr->save();
            $l = MainAccount::updateRefBal($m_user->referrer_id, $tr->amount);
            //$m = UserInv::dataS($i->user_id, true);
            Log::info('data',[$l]);
            return;
        }
        catch(\Exception $ex)
        {
            dd($ex);
            self::getLogger()->LogError('An error Occured', $ex,['tr' => $tr,'user' => $m_user]);
        }
    }
    public static function ReferralBonusTeacher($inv, $amount)
    {
        $user = User::find($inv->user_id);
        try{
            for($i = 5; $i > 0; $i--)
            {
                if($user->referrer_id != null) {
                    $user = User::find($user->referrer_id);
                    if($user->acc_id == 1)
                    {
                        //One Time Bonus
                       if($i == 5)
                       {
                           self::ReferralBonusStudent($inv, $amount);
                       }

                    }
                    elseif($user->acc_id == 2){
                        //Multigen
                        $transaction = new transaction();
                        $transaction->t_id = Transaction::GenerateTID();
                        $transaction->user_id = $user->referrer_id;
                        if($i == 5)
                        {
                            $transaction->amount = $amount * (5/100);
                        }

                        if($i == 4 || $i ==  3)
                        {
                            $transaction->amount = $amount * (2/100);
                        }

                        if($i == 2 || $i ==  1)
                        {
                            $transaction->amount = $amount * (1/100);
                        }
                        $transaction->descn = 'Investment Bonus - ' . $inv->inv_id;
                        $transaction->tn_id = 6;
                        $transaction->ts_id = 1;
                        $transaction->t_type = 1;
                        try{
                            //dd($transaction);
                            //if ($transaction->save()) {
                            if ($transaction->save()) {
                                Log::info($i . ' Transaction saved', ['transaction' => $transaction]);
                                if(MainAccount::updateRefBal($user->referrer_id, $transaction->amount)) {
                                    Log::info('Ref Account Updated');
                                }
                                $user = User::find($user->referrer_id);
                            }
                        }
                        catch (\Exception $exception)
                        {
                            dd($exception);
                            self::getLogger()->LogError('Transaction Could Not be saved',$exception,['transaction'=>(array)$transaction, 'user' => (array)$user,'m' => $m]);
                        }
                    }

                }
                else{
                    break;
                }
            }
        }
        catch(\Exception $ex)
        {
            dd($ex);
            self::getLogger()->LogError('Unable To Award Cash', $ex, ['referred' => $user,'m'=> $m]);
        }

    }
}
