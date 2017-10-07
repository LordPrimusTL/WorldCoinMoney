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
use Illuminate\Support\Facades\Mail;

class AppMailer
{
    public $message;
    public function send($email, $msg, $sub)
    {
        try{
            $email = explode(',',$email);
            Mail::send('User.Email.activate', ['msg' => $msg], function ($message) use ($email, $sub)
            {

                $message->from('Info@WorldCoin', 'CMIC Investment');
                $message->subject($sub);
                $message->to($email);
                $this->message = $message;
            });
            Log::info('Email Sent Successfully',['message' => $this->message,'by' => Auth::id()]);
        }
        catch(\Exception $ex)
        {
            $n = new Logger();
            $n->LogError('Unable to send Email',$ex,['message' => $this->message,'by' => Auth::id()]);
        }
    }
}