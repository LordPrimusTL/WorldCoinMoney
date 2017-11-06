<?php

namespace App\Http\Controllers;

use App\AcctDetails;
use App\AcctReq;
use App\Helpers\Logger;
use App\Investments;
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

class UserController extends Controller
{

    private function getLogger()
    {
        return new Logger();
    }

    //

    public function Dashboard()
    {
        //dd(Auth::user());
        return view('User.dashboard',['title' => "Dashboard"]);
    }


    //Profile
    public function Profile()
    {
        return view('User.profile',['title' => 'Profile','user' => Auth::user()]);
    }
    public function ProfileEdit(Request $request)
    {
        $this->validate($request,[
            'fullname' => 'required',
            'reg_type' => 'required',
            'pay_type' => 'required'
        ],
        [   'fullname.required' => 'Full Name Field Is Required',
            'reg_type.required' => 'Registration Type Field is Required',
            'pay_type.required' => 'Payment Type Field is Required'
        ]);
        //dd($request->all());
        $user = User::find(Auth::id());
        $old_user = $user;
        $user->fullname = $request->fullname;
        $user->reg_type = $request->reg_type;
        $user->payment_id = $request->pay_type;
        try{
            $user->save();
            Session::flash('success','Profile Updated Successfully');
            Log::info('Profile Update Successful',['old-user' => $old_user,'new-user' => $user,'by' => Auth::id()]);
        }
        catch(\Exception $ex)
        {
            $this->getLogger()->LogError('ERROR Profile Update Error',$ex, ['old-user' => $old_user,'new-user' => $user,'by' => Auth::id()]);
            Session::flash('error','An Error Occurred, Please Try Again');
        }
        return redirect()->back();
        //validate and save

    }
    public function ProfileEditPassword(Request $request)
    {
        $this->validate($request,[
            'password' => 'required',
            'new_password' => 'required',
            'new_confirm_password' => 'required|same:new_password'
        ], [
            'password.required' => 'Old Password Field Is Required',
            'new_password.required' => 'New Password Field Is Required',
            'new_confirm_password.required' => 'Confirm New Password Field Is Required',
            'new_confirm_password.same' => 'New Pasword Mismatch'
        ]);

        $user = User::find(Auth::id());
        if(Hash::check($request->password, $user->password))
        {
            $user->password = Hash::make($request->new_password);

            try{
                $user->save();
                Session::flash('success','Password Successfully Changed');
            }
            catch(\Exception $ex){
                Session::flash('error','An Error Occurred, Please Try Again Later');
                $this->getLogger()->LogError('Password Change Error', $ex);
            }
            //dd($request->all());
        }
        else{
            Session::flash('error','Password Does Not Match');
        }

        return redirect()->back();

    }
    public function AccountUpgrade(Request $req)
    {
        //dd($req->all());
        if(!AcctReq::FindByID(Auth::id()))
        {
            $m = new AcctReq();
            $m->user_id = Auth::id();
            $m->old_acct_type = Auth::user()->acc_id;
            $m->new_acct_type = $req->new_reg_type;
            $m->resolved = false;
            try{
                $m->save();
                Session::flash('success','Your Account Upgrade Request Has Been Successfully Submitted. We Will Get Back To You Shortly');
            }
            catch (\Exception $ex)
            {
                $this->getLogger()->LogError('An Error Occurred when tryig to save Request',$ex,['reg' => $m,'by' => Auth::id()]);
                Session::flash('error', 'An Error occured, Please try Again');
            }
        }
        else{
            Session::flash('error','You Still Have A request Pending. Please Let that Request Be Resolved First.');
        }
        return redirect()->back();
        //Session::flash()
    }


    //Transaction
    public function Transactions()
    {
        return view('User.transaction',['title' =>'Transaction','trans' => Auth::user()->trans]);
    }


    //Account
    public function Account()
    {
        //dd( Auth::user()->bal,  Auth::user()->acct);
        return view('User.account',['title' => 'Accounts','a' => Auth::user()->bal, 'acct' => Auth::user()->acct]);
    }

    public function AccountPost(Request $request)
    {
        try{
            //dd($request->all());
            $u = AcctDetails::where(['user_id' => Auth::id()])->first();
            if($u == null)
            {
                $a = new AcctDetails();
                $a->user_id = Auth::id();
                $a->bank = $request->bank;
                $a->name = $request->name;
                $a->number = $request->number;
                $a->save();
            }
            else{
                $u->user_id = Auth::id();
                $u->bank = $request->bank;
                $u->name = $request->name;
                $u->number = $request->number;
                $u->save();
            }

            Session::flash('success','Account Details Updated Successfully');
        }catch(\Exception $ex){
            $this->getLogger()->LogError('Account Could Not Be Updated', $ex,['acc' => $request->all()]);
            Session::flash('error','An Error Occurrd. Please try again later.');
        }
        return redirect()->back();
    }

    //InvestmentsMode
    public function Invest()
    {
        if(Auth::user()->reg_type == 1)
        {
            Session::flash('error','This Account can\'t Be Used For Trading. Kindly Visit The Personal Details Page to Upgrade Your Account');
            return redirect()->back();
        }
        else
            return view('User.invest',['title' => 'Investment','inv' => Auth::user()->inv()->orderBy('created_at','DESC')->get()]);
    }
    public function InvestPost(Request $request)
    {
        $this->validate($request,[
            'duration' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);
        if($request->amount < 10000)
        {
            Session::flash('error','The Minimum Amount For Trading WCM10,000.00');
            return redirect()->back();
        }
        if($request->duration < 1)
        {
            Session::flash('error','The Minimum Trading Duration Is 1 Month');
            return redirect()->back();
        }

        $i = new Investments();
        $i->inv_id = $this->generateInv();
        $i->user_id = Auth::id();
        $i->amount = $request->amount;
        $i->profit = 0;
        $i->month_count = 0;
        $amt = $request->amount;

        if($amt >= 10000 && $amt <= 50000)
            $i->irate = 10;
        if($amt > 50000 && $amt <= 100000)
            $i->irate = 20;
        if($amt > 100000 && $amt <= 200000)
            $i->irate = 30;
        if($amt > 200000 && $amt <= 500000)
            $i->irate = 40;
        if($amt > 500000 && $amt <= 1000000)
            $i->irate = 45;
        if($amt > 1000000)
            $i->irate = 50;
        $i->duration = $request->duration;
        $i->ts_id = 3;
        //dd($i);
        try{
            $i->save();
            Session::flash('success','Investment Application Pending Authorization');
            Log::info('Investment Successful',['by' => Auth::id(),'Inv' => $i]);
        }
        catch(\Exception $ex)
        {
            $this->getLogger()->LogError('Investment Application error',$ex,['by' => Auth::id(),'Inv' => $i]);
            Session::flash('error','An error occured. Please Try Again');
        }
        return redirect()->back();
    }

    //Referrals
    public function Referrals()
    {
        return view('User.referral',['title' => 'Referrals','ref' => Auth::user()->ref()->orderBy('created_at','DESC')->get()]);
    }
    public function RefOthers($id)
    {
        //$user
        return view('User.referral',['title' => User::find(decrypt($id))->fullname . ' Referrals','ref' => User::find(decrypt($id))->ref()->orderBy('created_at','DESC')->get()]);
    }


    //WithDrawals
    public function Withdrawals()
    {
        if(Utility::find(1)->value != 1)
        {
            Session::flash('error','Withdrawals Can\'t Be Made At This Time');
            return redirect()->back();
        }

        return view('User.with',['title' => 'Withdrawals','with'=>Withdrawal::where('user_id',Auth::id())->orderBy('created_at','DESC')->get(),
        'inv' => Transaction::where(['user_id' =>  Auth::id(),'tn_id' => 4,'t_type' => 1])->orWhere(['user_id' =>  Auth::id(),'tn_id' => 5,'t_type' => 1])->where('tn_id','<>',2)->get()]);//Come back
    }
    public function WithPost($id)
    {
        $tr = Transaction::find(decrypt($id));
        //dd(count($tr));
        if($tr != null)
        {
            $w = new Withdrawal();
            $w->w_id = Withdrawal::GenerateWID();
            $w->t_id = $tr->id;
            $w->ts_id = 3;
            $w->user_id = Auth::id();
            try{
                $w->save();
                Session::flash('success','Withdrawal Request Submitted Successfully');
                Log::info('Withdrawal Request Created',['with' => $w,'trans' => $tr]);
            }
            catch(\Exception $ex){
                $this->getLogger()->LogError('An Error Occured When Trying to create withdrawal request', $ex,['with' => $w,'trans' => $tr]);
                Session::flash('error','An Error Occurred When Creating the Withdrawal Request. Please Try Again');
            }
        }
        return redirect()->back();
    }


    //Utilities
    private function generateInv()
    {
        $inv_id = str_random(20);
        if(Investments::FindByInv($inv_id))
        {
            $this->generateInv();
        }
        else{
            return $inv_id;
        }
    }


    public function Support()
    {
        return redirect()->action('TicketController@UserTickets');
    }
}
