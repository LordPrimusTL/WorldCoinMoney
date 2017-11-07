<?php
/**
 * Created by PhpStorm.
 * User: micheal
 * Date: 10/17/17
 * Time: 11:29 AM
 */

namespace App\Helpers;


use App\Btc;
use App\Ticket;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Log;


class Mailerr
{
    protected $mailer;
    protected $fromAddress = 'info@worldcoinsmoney.com';
    protected $fromName = 'World Coins Crypto-Currency';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    private function Logger()
    {
        return new Logger();
    }
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function activateUser($user)
    {
        $this->to = $user->email;
        $this->subject = "Activate Your WorldCoin Account Account";
        $this->view = 'User.Email.activate';
        $this->data = compact('user');
        return $this->deliver();
    }

    public function sendMail($emails, $msg, $sub)
    {
        $em = explode(',',$emails);
        $email = [];
        foreach ($em as $e){
            array_push($email, trim($e));
        }
        $this->to = $email;
        $this->subject = $sub;
        $this->view = 'Email.all';
        $this->data = compact('msg');

        Log::info('Success ',[$email]);
        return $this->deliver();
    }


    public function activateMail($email, $name)
    {
        $this->to = $email;
        $this->subject = "Activate Your World Coin Account";
        $this->view = 'Email.btc';

        $btc = Btc::where(['status' => 0])->first();
        if($btc != null)
        {
            //$data = ['email' => $email, 'name' => $name,'btc' =>  $btc];
            $t = 1;
            $this->data = compact('email','name','btc', 't');
            $btc->email = $email;
            $btc->status = 1;
            $btc->save();
            $this->deliver();
        }
        else{
                $this->to = 'michealakinwonmi@gmail.com';
                $this->view = 'Email.admin';
                $t = 1;
                $this->data = compact('t','email');
                $this->deliver();
        }

    }


    public function deliver()
    {
        try{
            $this->mailer->send($this->view, $this->data, function($message) {
                $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
            });

            Log::info('Mail Sent - ');
            return true;
        }
        catch (\Exception $ex)
        {
            dd($ex);
            $this->Logger()->LogError('An Error Occured When Trying to Send Mail',$ex,['to' => $this->to
                , 'subj' => $this->subject,'data' => $this->data]);
            return false;
        }
    }

    public function sendTicketComments($ticketOwner, $user, Ticket $ticket, $comment)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'Email.ticket_comments';
        $this->data = compact('ticketOwner', 'user', 'ticket', 'comment');

        return $this->deliver();
    }

    public function sendTicketStatusNotification($ticketOwner, Ticket $ticket)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'Email.ticket_status';
        $this->data = compact('ticketOwner', 'ticket');

        return $this->deliver();
    }

    public function resetPassword($email, $token, $name)
    {
        $this->to = $email;
        $this->subject = 'Reset Your Password';
        $this->view = 'Email.reset';
        $this->data = compact('token','name');

        return $this->deliver();
    }

    public function visitor($name, $email, $sub, $msg)
    {
        $this->to = 'info@worldcoinsmoney.com';
        $this->subject = $sub;
        $this->view = 'Email.visitor';
        $this->data = compact('name','email','msg');

        return $this->deliver();
    }
}