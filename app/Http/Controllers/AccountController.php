<?php

namespace App\Http\Controllers;

use App\Helpers\Logger;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    private function getLogger()
    {
        return new Logger();
    }

    //GET
    public function Register()
    {
        return view('Account.register',['title' => 'Register','r_link' => null]);
    }

    public function RegisterRef($r_link)
    {
        return view('Account.register',['title' => 'Register','r_link' => $r_link]);
    }

    public function Login()
    {
        Auth::logout();
        return view('Account.login',['title' => 'Login']);
    }


    //Post
    public function RegisterPost(Request $request)
    {
        $this->validate($request,
            [
               'fullname' => 'required',
               'reg_type' => 'required',
               'pay_type' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'confirm_password' => 'required|same:password'


            ],
            ['confirm_password.same' => '  Passwords Does Not Match']
        );
        //dd($request->all());
        $u = new User();
        $u->fullname = $request->fullname;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $u->referrer_id = $request->referrer;
        $u->class_id = 0;
        $u->r_mark = 0;
        $u->reg_type = $request->reg_type;
        $u->r_link = explode(' ', $request->fullname)[0] . time();
        $u->payment_id = $request->pay_type;
        if($request->referrer != null)
        {
            $referrer = User::FindRefferer($request->referrer);
            if($referrer == null)
            {
                $u->referrer_id = null;
            }
            else{
                $u->referrer_id = $referrer->id;
            }

        }
        else{
            $u->referrer_id  = $request->referrer;// get refferer id
        }
        try{
            $u->save();
            Log::info('Account Created',['user' => $u]);
            Session::flash('success','An Activation Email Has Been Sent To The Email  Address You Provided');
            //Send Mail
        }
        catch(\Exception $ex)
        {
            $this->getLogger()->LogError('Registration Error', $ex,['User' => $u]);
            Session::flash('error','Oops, An Error Occurred. Please Try again Later');
        }
        return redirect()->back();
    }

    public function LoginPost(Request $request)
    {

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        //dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            //dd(Auth::user());
            if(Auth::user()->is_active)
            {
                if(Auth::user()->role_id == 3)
                {
                    return redirect()->action('UserController@Dashboard');
                }

                if(Auth::user()->role_id < 3)
                {
                    return redirect()->action('AdminController@Dashboard');
                }
            }
            else{
                Session::flash('error', 'Please contact the admin as your account has entered the dormancy period.');
                Auth::logout();
                return redirect()->back();
            }
        }
        {

        }
    }

    public function Logout()
    {
        if(Auth::Check())
        {
            Auth::logout();
            return redirect()->action('AccountController@Login');
        }
    }


}
