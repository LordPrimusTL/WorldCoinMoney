<?php

namespace App\Http\Controllers;

use App\FileEntry;
use App\Helpers\Logger;
use App\Helpers\Mailerr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UtilityController extends Controller
{
    private function getLogger()
    {
        return new Logger();
    }
    public function home()
    {
        Auth::logout();
        return view('Utility.default',['title' => 'Home']);
    }

    public function About()
    {
        return view('Utility.about',['title' => 'About']);
    }

    public function Contact()
    {
        return view('Utility.contact',['title' => 'Contact']);
    }


    public function getFile($filename)
    {

        $entry = FileEntry::where('filename', '=', $filename)->first();
        Log::info(['entry' => $entry]);
        if($entry != null)
        {
            Log::info('Not Null');
            $name  = $entry->filename;
            $mime  = $entry->mime;
        }
        else{
            Log::info('Null');
            $name = $filename;
            $mime  = 'image/png';
        }

        $file = Storage::disk('uploads')->get($name);

        return (new Response($file, 200))
            ->header('Content-Type', $mime);
    }

    public function SendVMail(Request $request, Mailerr $mailerr)
    {
        //dd($request->all());
        try{
            $mailerr->visitor($request->name, $request->email, $request->subject, $request->message);
            Session::flash('success','Mail Successfully Sent. ');
        }
        catch (\Exception $ex)
        {
            $this->getLogger()->LogError('An Error Occured',$ex,['data' => $request->all()]);
            Session::flash('error','An Error Occurred. Please do send a mail to us at info@worldcoinsmoney.com. Thank You');
        }
        return redirect()->back();
    }
}
