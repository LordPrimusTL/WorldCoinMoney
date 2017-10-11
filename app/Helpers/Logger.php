<?php
/**
 * Created by PhpStorm.
 * User: LordPrimus
 * Date: 10/4/2017
 * Time: 10:48 PM
 */

namespace App\Helpers;


use App\ErrorLogger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Logger
{
    private function SaveError($error_id)
    {
        $ae = new ErrorLogger();
        $ae->error_id = 'Error - '. $error_id;
        $ae->save();
        if(AuthCheck::AuthAdminCheck())
        {
            Session::flash('error','minor error occured, Please check Log');
        }
        Log::info('New Error saved in database to be treated');
    }

    public function LogError($errormsg,$ex,$other){
        $error_id = $this->ErrorID();
        if($other == null)
        {
            Log::error($errormsg,['error_id'=>$error_id,'error'=> $ex->getMessage().$ex->getLine().$ex->getTraceAsString()]);
        }
        else{
            Log::error($errormsg,['error_id'=>$error_id,'error'=> $ex->getMessage().$ex->getLine().$ex->getTraceAsString(), $other]);
        }

        $this->SaveError($error_id);
    }

    public function LogOError($errormsg, $other)
    {
        Log::error($errormsg,[$other]);
        $this->SaveError($this->ErrorID());

    }

    private function ErrorID()
    {
        $t_id = str_random(20);
        if(ErrorLogger::findByT_ID($t_id))
        {
            return $t_id;
        }
        else
        {
            var_dump(false);
            $this->ErrorID();
        }
        return $t_id;
    }
}