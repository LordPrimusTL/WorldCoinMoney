<?php
/**
 * Created by PhpStorm.
 * User: LordPrimus
 * Date: 10/4/2017
 * Time: 11:00 PM
 */

namespace App\Helpers;

use App\Helpers\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AppMailer
{
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
}