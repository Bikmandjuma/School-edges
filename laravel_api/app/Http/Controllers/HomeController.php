<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage(){
        return view('homePage.welcome');
    }

    public function about_us(){
        return view('homePage.about');
    }

    public function service(){
        return view('homePage.service');
    }
    public function course(){
        return view('homePage.course');
    }
    public function teachers(){
        return view('homePage.teachers');
    }
    public function contact(){
        return view('homePage.contact');
    }

    public function guestSubmitMessageContact(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'massage' => 'required|string',
        ]);
    }
}
