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
    protected $fromAddress = 'info@cryptotradingmatrix.com';
    protected $fromName = 'CRYPTO-TRADING MATRIX(Do-Not-Reply)';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];
    protected $admin = ["michealakinwonmi@gmail.com","hayroyalconsult@gmail.com","darolloladejo@gmail.com","michealakinwonmi@outlook.com"];

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
        $this->subject = "Activate Your Crypto Trading Matrix Account";
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


    public function payment($email, $name, $paytype)
    {
        $this->to = $email;
        $this->subject = "Activate Your Your Crypto Trading Matrix Account";
        $this->view = 'Email.payment';
        if($paytype == 1)
        {
            $this->data = compact('email','name', 'paytype');
            $this->deliver();
        }
        elseif($paytype == 2)
        {
            $btc = Btc::where(['status' => 0])->first();
            if($btc != null)
            {
                //$data = ['email' => $email, 'name' => $name,'btc' =>  $btc];
                $t = 1;
                $this->data = compact('email','name','btc', 'paytype');
                $btc->email = $email;
                $btc->status = 1;
                $btc->save();
                $this->deliver();
            }
            else{
                $this->to = $this->admin;
                $this->view = 'Email.admin';
                $t = 1;
                $this->data = compact('t','email');
                $this->deliver();
            }
        }

    }
    public function trading($email, $name, $paytype, $id)
    {
        $this->to = $email;
        $this->subject = "Trading Payment";
        $this->view = 'Email.trading';
        if($paytype == 1)
        {
            $this->data = compact('email','name', 'paytype', 'id');
            $this->deliver();
        }
        elseif($paytype == 2)
        {
            $btc = Btc::where(['status' => 0])->first();
            if($btc != null)
            {
                $this->data = compact('email','name','btc', 'paytype', 'id');
                $btc->email = $email;
                $btc->status = 1;
                $btc->save();
                $this->deliver();
            }
            else{
                $this->to = $this->admin;
                $this->view = 'Email.admin';
                $t = 2;
                $this->data = compact('t','email');
                $this->deliver();
            }
        }

    }

    public function sendTicketInformation($user, Ticket $ticket)
    {
        $this->to = $user->email;
        $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";
        $this->view = 'Email.ticket_info';
        $this->data = compact('user', 'ticket');
        return $this->deliver();
    }
    public function sendTicketComments($ticketOwner, $user, Ticket $ticket, $comment){
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'Email.ticket_comments';
        $this->data = compact('ticketOwner', 'user', 'ticket', 'comment');

        return $this->deliver();
    }

    public function sendTicketStatusNotification($ticketOwner, Ticket $ticket){
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'Email.ticket_status';
        $this->data = compact('ticketOwner', 'ticket');

        return $this->deliver();
    }

    public function resetPassword($email, $token, $name){
        $this->to = $email;
        $this->subject = 'Reset Your Password';
        $this->view = 'Email.reset';
        $this->data = compact('token','name');

        return $this->deliver();
    }

    public function visitor($name, $email, $sub, $msg){
        $this->to = 'support@cryptotradingmatrix.com';
        $this->subject = $sub;
        $this->view = 'Email.visitor';
        $this->data = compact('name','email','msg');

        return $this->deliver();
    }

    public function notify($msg)
    {
        $this->to = $this->admin;
        $this->subject = "Request/Notification";
        $this->view = 'Email.notification';
        $this->data = compact('msg');

        return $this->deliver();
    }

    public function deliver()
    {
        try{
            $this->mailer->send($this->view, $this->data, function($message) {
                $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
            });

            Log::info('Mail Sent');
            return true;
        }
        catch (\Exception $ex)
        {
            dd($ex);
            $this->Logger()->LogError('An Error Occured When Trying to Send Mail',$ex,['to' => $this->to
                , 'subj' => $this->subject,'data' => $this->data]);
            $this->sendError();
            return false;

        }
    }

    public function sendError($error = null)
    {
        $this->to = $this->admin;
        $this->subject = "Error";
        $this->view = 'Email.notification';
        $msg = "An Error Occurred With ID - $error";
        $this->data = compact('msg');
        Log::info('emailll',$this->admin);

        return $this->deliver();
    }
}