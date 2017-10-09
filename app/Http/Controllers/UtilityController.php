<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilityController extends Controller
{
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
}
