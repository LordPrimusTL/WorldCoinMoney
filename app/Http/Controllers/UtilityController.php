<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function home()
    {
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
