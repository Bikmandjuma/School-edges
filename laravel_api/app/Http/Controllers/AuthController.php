<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\User;

class AuthController extends Controller{
    public function login_form(){
        return view('auth.login');
    }

    public function forgotpswd_form(){
        return view('auth.forgotPassword');
    }

    //todo: admin login functionality
    public function login_functionality(Request $request){
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }elseif (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back()->with('success_login','User login well');
        }else{
            Session::flash('error-message','Invalid Username or Password');
            return back();
        }

    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login.form');
    }

    public function submit_forgot_password(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->input('email');

        $existsInAdmins = Admin::where('email', $email)->exists();
        $existsInUsers = User::where('email', $email)->exists();

        if (!$existsInAdmins && !$existsInUsers) {
            return back()->withErrors(['email' => 'The email doesn\'t found in our database !']);
        }

        // Continue with password reset logic
    }


    
}
