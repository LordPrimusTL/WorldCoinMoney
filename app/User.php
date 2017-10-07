<?php

namespace App;

use App\Helpers\Logger;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
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

    public function Reg()
    {
        return $this->belongsTo(RegistrationType::class,'reg_type');
    }

    public function Tclass()
    {
        return $this->belongsTo(TClass::class,'class_id');
    }

    public function Trade()
    {
        return $this->hasMany(Investments::class,'user_id');
    }

    public static function MultiGenRef($id)
    {
       try{
           $user = User::find($id);
           $referrer = User::find($user->referrer_id);
           $user->activated = true;
           try{
               $user->save();
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
                       //dd('am Here');
                       self::AwardCash($user);
                       //Send Activated Mail
                   } catch (\Exception $exception) {
                       Session::flash('error', 'Operation Could Not be completed At this time');
                       //$this->getLogger()->LogError('Referral Could Not Be saved',$exception,(array)$rf);
                       //return redirect()->back();
                   }
               }
               else{
                   dd($user, $referrer);
                   Log::error('Referral Could Not Be saved', (array)$user);
               }
           }
           catch(\Exception $exception){
               Session::flash('error','Operation Could not be completed at this time');
               self::getLogger()->LogError('Could Not Activate User',$exception,(array)$user);
           }
       }
       catch (\Exception $ex)
       {
           dd($ex);
       }
    }

    private static function AwardCash($referred)
    {
        try{
            for($i = 5; $i > 0; $i--)
            {
                if($referred->referrer_id != null) {
                    $user = User::find($referred->referrer_id);
                    $transaction = new transaction();
                    $transaction->t_id = Transaction::GenerateTID();
                    $transaction->user_id = $referred->referrer_id;
                    $transaction->amount = 1000;
                    $transaction->descn = 'Referral Bonus';
                    $transaction->tn_id = 3;
                    $transaction->ts_id = 1;
                    $transaction->t_type = 3;
                    try{
                        //dd($transaction);
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
                        dd($exception);
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
            dd($ex);
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
            dd($ex);
        }
    }

}
