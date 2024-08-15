<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainAuthController extends Controller
{
    public function login(){
        return view('mainHome.auth.login')->with('hideFooter',true);
    }
}
