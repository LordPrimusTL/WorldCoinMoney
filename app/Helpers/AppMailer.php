<?php
/**
 * Created by PhpStorm.
 * User: LordPrimus
 * Date: 10/4/2017
 * Time: 11:00 PM
 */

namespace App\Helpers;

use App\Btc;
use App\Helpers\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AppMailer
{

    private function getLogger()
    {
        return new \App\Helpers\Logger();
    }

    public $message;
    public  function send($email, $msg, $sub)
    {
        try{
            $email = explode(',',$email);
            Mail::send('Email.all', ['msg' => $msg], function ($message) use ($email, $sub)
            {
                $message->from('Info@WorldCoin', 'World Coin Crypto-Currency');
                $message->subject($sub);
                $message->to($email);
                $this->message = $message;
            });
            Log::info('Email Sent Successfully',['message' => $this->message,'by' => Auth::id()]);
            return true;
        }
        catch(\Exception $ex)
        {
            $n = new Logger();
            $n->LogError('Unable to send Email',$ex,['message' => $this->message,'by' => Auth::id()]);
            return false;
        }
    }

    public function activate($user)
    {
        $email = $user->email;
        try{
            //$email = explode(',',$email);
            Mail::send('Email.reg_mail',['user' => $user], function ($message) use ($email)
            {

                $message->from('Info@WorldCoin', 'World Coin Crypto-Currency');
                $message->subject('Activate Your WorldCoin Account');
                $message->to($email);
                //$this->message = $message;
            });
            Log::info('Activation Email Sent Successfully',['Email' => $this->message,'by' => Auth::id()]);
            return true;

        }
        catch(\Exception $ex)
        {
            $n = new Logger();
            $n->LogError('Unable to send Email',$ex,['message' => $this->message,'by' => Auth::id()]);
        }
    }

    public function btcmail($email, $name)
    {
        try{
            $btc = Btc::where(['status' => 0])->first();
            //dd($btc);
            if($btc != null)
            {
                try{
                    Mail::send('Email.btc',['btc' => $btc, 'name' => $name, 't' => 1], function ($message) use ($btc, $email)
                    {

                        $message->from('Info@worldcoinsmoney', 'World Coin Crypto-Currency');
                        $message->subject('Activate Your World-Coin Account');
                        $message->to($email);
                        //$this->message = $message;
                        Log::info('Email Sent',['email' =>  $email]);
                    });
                }
                catch (\Exception $ex)
                {
                    dd($ex);
                }

                Log::info('Email Sent');
                //$btc->email = $email;
                //$btc->status = 1;
                //$btc->save();
            }
            else{
                $message = 'Please Kindly Review the Count of BTC Addresses Remaining. ';
                Mail::send('Email.admin',['btc' => $btc,'msg' => $message, 'email' => $email, 't' => 1], function ($message) use ($btc, $email)
                {

                    $message->from('Info@WorldCoin', 'World Coin Crypto-Currency');
                    $message->subject('Administrator Alert');
                    $message->to('michealakinwonmi@gmail.com');
                    //$this->message = $message;
                });

            }
        }
        catch (\Exception $ex)
        {
            dd($ex);
            $this->getLogger()->LogError('A Fatal Error Occurred When trying To Send Mail',$ex,['email' => $email,'name' => $name,'body' => 'Email.btc']);
        }
    }
}