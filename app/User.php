<?php

namespace App;

use App\Helpers\Logger;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    private static function getLogger()
    {
        return new Logger();
    }


    public static function FindRefferer($link)
    {
        $user = User::where(['r_link' => $link,'activated' => true])->get();
        if(count($user) > 0)
        {
            return $user[0];
        }
        else{
            return null;
        }

    }

    public function trans()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }
    public function Reg()
    {
        return $this->belongsTo(RegistrationType::class,'reg_type');
    }


    public function inv()
    {
        return $this->hasMany(Investments::class,'user_id');
    }
    public function Tclass()
    {
        return $this->belongsTo(TClass::class,'class_id');
    }

    public function withd()
    {
        return $this->hasMany(Withdrawal::class,'user_id');
    }

    public function Trade()
    {
        return $this->hasMany(Investments::class,'user_id');
    }

    public function bal()
    {
        return $this->hasOne(MainAccount::class,'user_id');
    }

    public function ref()
    {
        return $this->hasMany(Referral::class,'referrer');
    }
  
    public function acct()
    {
        return $this->hasOne(AcctDetails::class,'user_id');
    }

    public static function MultiGenRef($id)
    {
       try{
           //Start Transaction
           $user = User::find($id);
           $referrer = User::find($user->referrer_id);
           $user->activated = true;
           try{
               if($user->save())
               {
                   if($user->referrer_id != null) {
                       $rf = new Referral();
                       $rf->referred = $user->id;
                       $rf->referrer = $referrer->id;
                       if ($referrer->referrer != null) {
                           $rf->base_link = Referral::FindRefLink($referrer->referrer_id, $referrer->id);
                       } else {
                           $rf->base_link = null;
                       }
                       $rf->ref_link = $referrer->id . '_' . $user->id;
                       try {
                           $rf->save();
                           Log::info('Referral saved', ['rf' => $rf]);
                           self::AwardCash($user, $rf->ref_link);
                           //Send Activated Mail
                       } catch (\Exception $exception) {
                           Session::flash('error', 'Operation Could Not be completed At this time');
                           self::getLogger()->LogError('Referral Could Not Be saved',$exception,(array)$rf);
                       }
                   }
               }
               else{
                   Log::error('error, User not Saving',[$user]);
               }


           }
           catch(\Exception $exception){
               Session::flash('error','Operation Could not be completed at this time');
               self::getLogger()->LogError('Could Not Activate User',$exception,(array)$user);
           }
       }
       catch (\Exception $ex)
       {
           self::getLogger()->LogError('An Error Occured',$ex,[]);
       }
    }

    private static function AwardCash($referred, $a)
    {
        try{
            for($i = 5; $i > 0; $i--)
            {
                if($referred->referrer_id != null) {
                    $user = User::find($referred->referrer_id);
                    $transaction = new Transaction();
                    $transaction->t_id = Transaction::GenerateTID();
                    $transaction->user_id = $referred->referrer_id;
                    if($user->acc_id == 1)
                    {
                        $transaction->amount = $i;
                    }
                    elseif($user->acc_id == 2){
                        $transaction->amount = 1000;
                    }
                    else{
                        $transaction->amount = 0;
                        self::getLogger()->LogOError('Account Type Could Not Be Determined',['user' => $user,'trans' => $transaction]);
                    }
                    $transaction->descn = 'Referral Bonus - ' . $a;
                    $transaction->tn_id = 3;
                    $transaction->ts_id = 1;
                    $transaction->t_type = 1;
                    try{
                        //dd($transaction);
                        //if ($transaction->save()) {
                        if ($transaction->save()) {
                            Log::info($i . ' Transaction saved', ['transaction' => $transaction]);
                            if(MainAccount::updateRefBal($referred->referrer_id, $transaction->amount)) {
                                Log::info('Ref Account Updated');
                                if ($user->class_id != 0) {
                                    Log::info('Class recruiting limit reached', (array)$user);
                                } else {
                                    try {
                                        $user->r_mark++;
                                        self::RfUpdate($user);
                                        $user->save();
                                        Log::info('referral mark added', (array)$user);
                                    } catch (\Exception $ex) {
                                        self::getLogger()->LogError('Referral Mark Could not be Added', $ex, ['user' => (array)$user]);
                                    }

                                }
                            }
                            $referred = User::find($referred->referrer_id);
                        }
                    }
                    catch (\Exception $exception)
                    {
                        //dd($exception);
                        self::getLogger()->LogError('Transaction Could Not be saved',$exception,['transaction'=>(array)$transaction, 'user' => (array)$user]);
                    }
                }
                else{
                    break;
                }
            }
        }
        catch(\Exception $ex)
        {
            self::getLogger()->LogError('Unable To Award Cash', $ex, ['referred' => $referred]);
            //dd($ex);
        }
    }

    private static function RfUpdate($user)
    {
        try{
            if ($user->r_mark == TClass::find($user->class_id + 1)->target) {
                $user->class_id++;
                $user->save();
                $referrer = User::find($user->referrer_id);
                if ($referrer == null) {
                    Log::info('referrer is null', (array)$referrer);
                    return;
                } else {
                    $referrer->r_mark++;
                    $referrer->save();
                    self::RfUpdate($referrer);
                }
            }
        }
        catch (\Exception $ex)
        {
            self::getLogger()->LogError('Unabble to add referral mark',$ex);
        }
    }

    public function req()
    {
        return $this->hasMany(AcctReq::class,'user_id');
    }

    public static function FindByEmail($email)
    {
        return User::where(['email' => $email])->first();
    }

}
