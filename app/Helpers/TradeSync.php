<?php
/**
 * Created by PhpStorm.
 * User: LordPrimus
 * Date: 10/6/2017
 * Time: 6:05 AM
 */

namespace App\Helpers;


use App\Investments;
use App\MainAccount;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TradeSync
{
    private function getLogger()
    {
        return new Logger();
    }
    public function Sync()
    {
        Log::info('Starting Trade Sync');
        $trades = Investments::where(['ts_id' => 6])->get();
        //
        if(count($trades) == 0)
        {
            return;
        }
        else{

            foreach ($trades as $trade)
            {
                $old_trade = $trade;
                $sd = Carbon::parse($trade->start_date);
                $diff = $sd->diffInMonths(Carbon::now());
                if($diff > $trade->month_count)
                {
                    $trade->month_count = $diff;
                    try{
                        if($trade->month_count < $trade->duration)
                        {
                            $trade->profit = $trade->profit + (($trade->amount*($trade->irate/100)));
                            $trade->save();
                            $tr = new Transaction();
                            $tr->t_id = Transaction::GenerateTID();
                            $tr->user_id = $trade->user_id;
                            $tr->amount = (($trade->amount*($trade->irate/100)));
                            $tr->descn = $trade->inv_id;
                            $tr->tn_id = 4;
                            $tr->ts_id = 1;
                            $tr->t_type = 1;
                            $tr->save();
                        }
                        //dd($sd, $diff,$trade);
                        if($trade->month_count == $trade->duration)
                        {
                            //dd($sd, $diff,$trade);
                            $trade->profit = $trade->profit + (($trade->amount*($trade->irate/100)));
                            //$trade->total_inv = $trade->amount + $trade->profit_acc;
                            $trade->ts_id = 7;
                            $tr = new Transaction();
                            $tr->t_id = Transaction::GenerateTID();
                            $tr->user_id = $trade->user_id;
                            $tr->amount = $trade->profit;
                            $tr->descn = 'Trading Profit - ' . $trade->inv_id;
                            $tr->tn_id = 4;
                            $tr->ts_id = 1;
                            $tr->t_type = 1;
                            $tr->save();

                            $trr = new Transaction();
                            $trr->t_id = Transaction::GenerateTID();
                            $trr->user_id = $trade->user_id;
                            $trr->amount = $trade->profit;
                            $trr->descn = 'Trading Complete - ' . $trade->inv_id;
                            $trr->tn_id = 1;
                            $trr->ts_id = 1;
                            $trr->t_type = 5;
                            $trr->save();
                            Log::info('Transaction Created',['trade' => $trade,'trans' => $tr,'capital' => $trr]);
                            $m = MainAccount::updateTradeBal($trade->user_id, $tr->amount);
                            //dd($sd, $diff,$trade, $tr,$m, 'me');
                            Log::info("Main Account Updated");
                            $trade->save();
                            Log::info('Trade Sync: Transaction Updated',['Old Trans'=> $old_trade,'trans' => $tr,'main account'=> $m,'trade'=>$trade,'user'=>Auth::user()]);

                        }
                        Log::info('Trade Sync: Trade Updated Successfully',['old_trade' => $old_trade,'trade' => (array)$trade, 'user'=>Auth::id()]);
                    }
                    catch(\Exception $ex)
                    {
                        self::getLogger()->LogError('Trade Sync: Error occured while saving trade', $ex, ['old_trade' => $old_trade,'trade' => (array)$trade, 'user'=>Auth::id()]);
                    }
                }
                else{

                }
                //$this->MyEcho(Carbon::parse($trade->start_date));
                //$this->MyEcho(Carbon::parse($trade->start_date)->diffInMonths(Carbon::now()));
            }
            Session::flash('success','Trade Sync Completed Sucessfully');
            return;

        }
    }
}