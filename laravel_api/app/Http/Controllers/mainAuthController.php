<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainAuthController extends Controller
{
    public function login(){
        return view('mainHome.auth.login')->with('hideFooter',true);
    }

    public function forgot_password(){
        return view('mainHome.auth.forgot-password')->with('hideFooter',true);
    }

    public function home(){
        return view('mainHome.pages.welcome');
    }

    public function about_us(){
        return view('mainHome.pages.about');
    }

    public function services(){
        return view('mainHome.pages.service');
    }

    public function pricing(){
        return view('mainHome.pages.pricing');
    }

    public function contact(){
        return view('mainHome.pages.contact');
    }

    
}
