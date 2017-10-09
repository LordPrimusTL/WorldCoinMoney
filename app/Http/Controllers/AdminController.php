<?php

namespace App\Http\Controllers;

use App\Helpers\Logger;
use App\Helpers\TradeSync;
use App\Investments;
use App\MainAccount;
use App\Referral;
use App\Transaction;
use App\User;
use App\Utility;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private function getId($id)
    {
        return $id/(8009 * 8009);
    }

    private function getLogger()
    {
        return new Logger();
    }

    //User View.
    public function Dashboard()
    {
        return view('Admin.dashboard',['title' => 'Dashboard', 'users' => User::where(['role_id' => 3])->get()]);
    }
    public function UserView($id)
    {
        $u = User::find(decrypt($id));
        return view('Admin.user_view',['title' => 'User View','user' =>  $u]);
    }
    public function UserEdit(Request $request, $id)
    {
        $this->validate($request,[
            'password' => 'required'
        ]);
        try{
            $u = User::find($this->getId($id));
            $old = $u;
            if(Hash::check($request->password, $u->password)) {
                $u->acc_id = $request->acc_id != null ? $request->acc_id : $u->acc_id;
                if ($u->class_id == $request->class_id) {
                    $u->class_id = $request->class_id;
                } else {
                    $u->class_id = $request->class_id;
                    $u->r_mark = 0;
                }
                //$u->class_id = $request->class_id == null ? 0 : $request->class_id;
                $u->is_active = (bool)$request->is_active;
                $u->activated = (bool)$request->activated;
                if ($u->activated) {
                   // dd('am here');
                    if (Referral::FindByUserAndReferrer($u->id, $u->referrer) == null) {
                        User::MultiGenRef($u->id);
                    }
                    $u->start_date = Carbon::now();
                }
                $u->save();
                Session::flash('success', 'User Profile Updated Succuessfully');
                Log::info('User Profile Updated', ['old_user' => $old, 'new_user' => $u]);
            }
            else{
                Session::flash('error','Incorrect Password');
            }
        }
        catch(\Exception $ex)
        {
            Session::flash('error','Unable to Update User Profile');
            $this->getLogger()->LogError('Admin: User Profile Update','Unable to Update User Profile',$ex,['old_user' => $old,'new_user' => $u]);
        }
        return redirect()->back();
    }

    //Trading
    public function Trade()
    {
        try{
            $t = new TradeSync();
            $t->Sync();
        }
        catch (\Exception $exception){
            $this->getLogger()->LogError('Error Occured when Syncing Trade', $exception,null);
        }
        return view('Admin.tradings',['title' => 'Tradings','trades' => Investments::orderBy('created_at','DESC')->get()]);
    }
    public function TradeAction($id, $a_id)
    {

        try{
            $a = decrypt($a_id);
            $i = Investments::FindbyInvD(decrypt($id));
            $old = $i;
            if($a == 1)
            {
                $i->ts_id = 6;
                $i->start_date = Carbon::now();
                $i->save();
                $t = new Transaction();
                $t->t_id = Transaction::GenerateTID();
                $t->user_id = $i->user_id;
                $t->amount = $i->amount;
                $t->descn = 'Trade-' . $i->inv_id;
                $t->tn_id = 1;
                $t->t_type = 2;
                $t->ts_id = 1;
                $t->save();
                Log::info('Transaction saved',['Trans' => $t]);
                //Put In Transaction
            }

            if($a == 2)
            {
                $i->ts_id = 5;
                $i->save();

            }
            $i->save();
            Log::info('Operation completed successfully',['old' =>$old,'i' => $i,'action' => $a,'by' =>Auth::id()]);
            Session::flash('success','Operation Completed Successfully');
        }
        catch(\Exception $ex){
            $this->getLogger()->LogError('Trade Action: An Error Occurred',$ex,['old' =>$old,'i' => $i,'action' => $a,'by' =>Auth::id()]);
            Session::flash('error','Oops An Error Occured, Please Try Again');
        }
        return redirect()->back();

    }

    //Transaction
    public function Transaction()
    {
        return view('Admin.trans',['title' => 'Transactions','trans' => Transaction::orderBy('created_at', 'DESC')->get()]);
    }


    //Account
    public function Account()
    {
        return view('Admin.account',['title' => 'Accounts','main' => MainAccount::orderBy('created_at','DESC')->get()]);
    }
    public function AccountUpdate($id)
    {
        return view('Admin.account_update',['title' => 'Update Account','Main' => MainAccount::find(decrypt($id))]);
    }
    public function AccountUpdatePost(Request $request, $id)
    {
        $this->validate($request,[
           'amount' => 'required|numeric',
           'acct_type' => 'required',
            'password' => 'required'
        ],[
            'acct_type.required' => 'Please Select An Account Type To Update.'
        ]);

        $main = MainAccount::find(decrypt($id));
        if($request->acct_type == 1)
        {
            $main->trade_bal = $main->trade_bal + $request->amount;
        }

        if($request->acct_type == 2)
        {
            $main->ref_bal = $main->ref_bal + $request->amount;
        }

        try{
           if(Hash::check($request->password, Auth::user()->password))
           {
               $main->save();
               Session::flash('success','Account Updated Successfully');
               return redirect()->action('AdminController@Account');
           }
           else{
               Session::flash('error','Incorrect Password. Please Try Again');
               return redirect()->back();
           }
        }
        catch(\Exception $ex)
        {
            $this->getLogger()->LogError('An error Occurred When Updating Account', $ex,['Main'=>$main,'req' => $request->all()]);
            Session::flash('error','An Error Occurred. Please Try Again');
            return redirect()->back();
        }

    }

    public function Withdrawal()
    {
        return view('Admin.withdrawal',['title'=>'Withdrawal Request','with' => Withdrawal::orderBy('created_at','DESC')->get()]);
    }
    public function WithAction($id,$a_id)
    {
        try{
            $a = decrypt($a_id);
            $i = Withdrawal::find(decrypt($id));
            $old = $i;
            if(decrypt($a_id) == 1)
            {
                //dd($a, $i);
                $i->ts_id = 1;
                $i->save();
                $t = new Transaction();
                $t->t_id = Transaction::GenerateTID();
                $t->user_id = $i->user_id;
                $t->amount = $i->trans->amount;
                $t->descn = 'Trade-' . $i->inv_id;
                $t->tn_id = 2;
                $t->t_type = 2;
                $t->ts_id = 1;
                $t->save();
                Log::info('Transaction saved',['Trans' => $t]);
                //Put In Transaction
            }

            if($a == 2)
            {
                $i->ts_id = 5;
                $i->save();
            }
            $i->save();
            Log::info('Operation completed successfully',['old' =>$old,'i' => $i,'action' => $a,'by' =>Auth::id()]);
            Session::flash('success','Operation Completed Successfully');
        }
        catch(\Exception $ex){
            $this->getLogger()->LogError('Trade Action: An Error Occurred',$ex,['old' =>$old,'i' => $i,'action' => $a,'by' =>Auth::id()]);
            Session::flash('error','Oops An Error Occured, Please Try Again');
        }

        return redirect()->back();
    }

    //Utility
    public function Util()
    {
        return view('Admin.utils',['title' => 'Utility','util' => Utility::all()]);
    }
    public function UtilPost(Request $request)
    {
        //dd($request->all());
        try{
            $u = Utility::find($request->id);
            $u->value = $request->new_value;
            $u->save();
            Session::flash('success','Utilities Updated Successfully');
        }
        catch(\Exception $ex)
        {
            $this->getLogger()->LogError('An error Occurred When updating utility',$ex,['u'=>$u]);
            Session::flash('error','An Error Occurred When Updating Utilities');
        }
        return redirect()->back();

    }


}
