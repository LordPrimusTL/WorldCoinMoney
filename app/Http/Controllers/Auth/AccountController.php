<?php

namespace App\Http\Controllers;

use App\Btc;
use App\FileEntry;
use App\Helpers\AppMailer;
use App\Helpers\Logger;
use App\Helpers\Mailerr;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\ResetPassword;
use App\SchoolFees;
use App\User;
use App\UserTemp;
use Carbon\Carbon;
use Egulias\EmailValidator\Validation\Error\RFCWarnings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

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
    public function RegisterPost(Request $request, Mailerr $mailer)
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
            if($u->save())
            {
                Log::info('Account Created',['user' => $u]);
                //$s = new AppMailer();
                if($u->payment_id == 2)
                {
                    $mailer->activateMail($u->email, explode(' ',$u->fullname)[0]);
                }

                Session::flash('success','An Activation Email Has Been Sent To The Email  Address You Provided.');
                return redirect()->action('AccountController@WTDN');
            }
            else{
                Session::flash('error','An Error Occurred When Trying To Create Account. Please Try Again');
                return redirect()->back();
            }
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
        //dd('Hete');

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
        else
        {
            Session::flash('error','Incorrect Username/Password');
            return redirect()->back();
        }
    }

    public function Logout()
    {
        if(Auth::Check())
        {
            Auth::logout();
            return redirect()->action('AccountController@Login');

        }
        else{
            return redirect()->action('AccountController@Login');

        }
    }

    public function ForgotPassword()
    {
        return view('Account.forget_password',['title' => 'Forgot Password','t' => 1]);
    }

    public function ForgotPasswordPost(Request $request, Mailerr $mailer)
    {
        $this->validate($request,[
            'email' => 'required'
        ]);
        //dd($request->all());
        $user = User::FindByEmail($request->email);
        try{
            if($user != null )
            {
                $r = new ResetPassword();
                $r->email = $request->email;
                $r->token = ResetPassword::GenerateRID();
                $r->used = false;
                $r->save();
                $mailer->resetPassword($r->email, $r->token, explode(' ', $user->fullname)[0]);
                Session::flash('success','A Mail Has Been Sent To Your Email Address Containing a Token');
            }
            else{
                Session::flash('error','Sorry, We Could Not Find The Account You Providded');
                return view('Account.forget_password',['title' => 'Reset Password','t' => 3]);
            }
        }
        catch(\Exception $ex)
        {
            $this->getLogger()->LogError('An Error Occurred When Trying to Reset Password',$ex,['r' =>  $r]);
            Session::flash('error','An Error Occurred When Trying to Reset Password, Please Try Again');
        }
        return redirect()->back();

    }

    public function ResetLink($token)
    {
        $d = ResetPassword::FindByToken($token);
        if($d == null)
        {
            Session::flash('error','Incorrect Token, Please Try Resetting Your Password Again');
            return view('Account.forget_password',['title' => 'Reset Password','t' => 3]);
        }
        else{
            return view('Account.forget_password',['title' => 'Reset Password','t' => 2, 'token' =>  $token]);
        }
    }

    public function RecoverPassword(Request $request, $token)
    {
        $this->validate($request,[
            'email' =>  'required',
            'new_password' => 'required',
            'conf_new_password' => 'required|same:new_password',
        ],['conf_new_password' => 'Password Mismatch']);

        $d = ResetPassword::FindByToken($token);
        if($d == null)
        {
            return redirect()->action('AccountController@ForgotPassword');
        }

        if($request->email === $d->email || $token === $d->token)
        {
            $m = User::FindByEmail($d->email);
            if($m != null)
            {
                $m->password = Hash::make($request->new_password);
                $m->save();
                $d->used = true;
                $d->save();
                Session::flash('success','Password Successfully Changed');
                return redirect()->action('AccountController@Login');
            }
            else{
                Session::flash('error','Sorry, We Could Not Find The Account You Provided');
                return redirect()->action('AccountController@Register');
            }
        }
    }

    //AccountActivation
    public function WTDN()
    {
        return view('Account.what-to-do-next',['title' => 'What To Do Next']);
    }
    //Evidence of Payment
    public function EOP($token)
    {
        if(decrypt($token) == 1 || decrypt($token) == 2)
        {
            return view('Account.evidence-of-payment',['title' => 'Upload Evidence Of Payment','t' => decrypt($token)]);
        }
        else
        {
            Session::flash('error','Invalid Method Of Payment');
            return redirect()->back();
        }
    }
    public function EOPP($token, Request $request)
    {
        try{
            if(decrypt($token) == 1)
            {
                $this->validate($request,[
                    'pop' => 'required|image',
                    'hash' => 'required',
                ]);
                if($request->hasFile('pop'))
                {
                    $n = new SchoolFees();
                    $n->email = $request->email;
                    $n->pay_type = decrypt($token);
                    $n->hash_id = $request->hash;
                    $fl = new FileEntry();
                    $file = $request->file('pop');
                    $imagename = $n->email .'-'.Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
                    Storage::disk('uploads')->put( $imagename,  File::get($file));
                    $fl->mime = $file->getClientMimeType();
                    $fl->original_filename = $file->getClientOriginalName();
                    $fl->filename = $imagename;
                    //dd($request->all(), decrypt($token), $fl, $n);
                    try{
                        $fl->save();
                        $n->pop = $imagename;
                        $n->save();
                        Log::info('File Entry And Schholfess Evidence Saved.',['School' => $n,'FileEntry' => $fl]);
                        Session::flash('success','File Submitted Successfully. We Will Get Back To You Shortly');
                    }
                    catch(\Exception $ex)
                    {
                        //dd($ex);
                        Session::flash('error','An Error Occurred. Please Try Again');
                        $this->getLogger()->LogError('Unable To Save File or School Fees',$ex,['School' => $n,'FileEntry' => $fl]);
                    }


                }
            }

            if(decrypt($token) == 2)
            {
                $this->validate($request,[
                    'email' => 'required',
                    'teller' => 'required',
                ]);
                if($request->hasFile('teller'))
                {
                    $n = new SchoolFees();
                    $n->email = $request->email;
                    $n->pay_type = decrypt($token);
                    $fl = new FileEntry();
                    $file = $request->file('teller');
                    $imagename = $n->email .'-'.Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
                    Storage::disk('uploads')->put( $imagename,  File::get($file));
                    $fl->mime = $file->getClientMimeType();
                    $fl->original_filename = $file->getClientOriginalName();
                    $fl->filename = $imagename;
                    //dd($request->all(), decrypt($token), $fl, $n);
                    try{
                        $fl->save();
                        $n->teller = $imagename;
                        $n->save();
                        Log::info('File Entry And Schholfess Evidence Saved.',['School' => $n,'FileEntry' => $fl]);
                        Session::flash('success','File Submitted Successfully. We Will Get Back To You Shortly');
                    }
                    catch(\Exception $ex)
                    {
                        //dd($ex);
                        Session::flash('error','An Error Occurred. Please Try Again');
                        $this->getLogger()->LogError('Unable To Save File or School Fees',$ex,['School' => $n,'FileEntry' => $fl]);
                    }
                }
            }


            return redirect()->back();
        }
        catch (\Exception $ex)
        {
            Session::flash('error','An Error Occured. Please Try Again');
            ////dd($ex);
            $this->getLogger()->LogError('An Error Occurred When Opening This Page', $ex, null);
        }
    }


    public function mailTest()
    {
        $s  = new AppMailer();
        $s->btcmail('micheal@prime.com');
    }

}
