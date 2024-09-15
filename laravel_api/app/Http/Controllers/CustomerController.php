<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function customer_home(){
        return view('mainHome.customer.home');
    }

    public function logout(){

        // Check which guard is currently authenticated
        if (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout(); // Logout admin
        }

        // Redirect to login form
        return redirect()->route('main.login.page');

    }

}
