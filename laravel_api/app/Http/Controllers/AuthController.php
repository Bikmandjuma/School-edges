<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\ShareHolder;
use App\Models\Customer;
use App\Models\ResetCodePassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendCodeResetPassword;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller{
    public function login_form(){
        return view('auth.login');
    }

    public function forgotpswd_form(){
        return view('auth.forgotPassword');
    }


    public function submit_forgot_password(Request $request){
        $request->validate([
            'email' => 'required|email'
        ],[
            'email.required' => 'Please enter an email !'
        ]);

        $email = $request->input('email');

        $existsInAdmins = ShareHolder::where('email', $email)->exists();
        $existsInUsers = Customer::where('email', $email)->exists();

        if (!$existsInAdmins && !$existsInUsers) {
        
            return back()->withErrors(['email' => 'The email doesn\'t found in our database !']);
        
        }else{

            // Delete all old code that user send before.
            ResetCodePassword::where('email', $email)->delete();

            // Generate random code
            $data=[
                'email' => $email,
                'code' => mt_rand(100000, 999999),
            ];

            // Create a new code
            $reset_data = ResetCodePassword::create($data);

            // Send email to user
            Mail::to($email)->send(new SendCodeResetPassword($reset_data->email,$reset_data->code));

            // toastr()->info('Email sent',['timeOut' => 5000]);

            return redirect()->back()->with('success','Check email we sent you a reset code !');

        }

    }

    public function reset_password_code($email,$code){
        $email=Crypt::decrypt($email);
        $code=Crypt::decrypt($code);

        return view('users.reset_password_code',compact('email','code'));
    }

    public function codeCheck(Request $request,$email,$code){
        $request->validate([
            'code' => 'required|string|min:6|exists:reset_code_passwords',
        ]);

        // find the code
        $passwordReset = ResetCodePassword::where('email', $email)
                                      ->where('code', $code)
                                      ->first();

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at < now()->subHour()) {
            $passwordReset->delete();
            // toastr()->error('passwords code is expired',['timeOut' => 5000]);
            return redirect()->back()->with('error','The code is expired');
        }else{
            toastr()->success('The code is valid !',['timeOut' => 5000]);
            return redirect()->back()->with('valid_code','The code is valid !');
        }

    }

    public function resetPassword($email,$code){
        $email=Crypt::decrypt($email);
        $code=Crypt::decrypt($code);

        return view('users.reset-Password-form',compact('email','code'));

    }

    public function submitResetPassword(Request $request,$email,$code){
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $password=$request->password;

        // find the code
        $passwordResetCode = ResetCodePassword::where('code', $code)
                             ->where('email', $email)
                             ->firstOrFail();
 
        // Find the user or admin by email
        $user = User::firstWhere('email', $passwordResetCode->email);
        $admin = Admin::firstWhere('email', $passwordResetCode->email);

        // Update the password if user or admin exists
        if ($user) {
            $user->update(['password' => bcrypt($password)]);
            $passwordResetCode->delete();
            return redirect()->route('login.form')->with('success', 'Password updated successfully !');
            
        } elseif ($admin) {
            $admin->update(['password' => bcrypt($password)]);
            $passwordResetCode->delete();
            return redirect()->route('login.form')->with('success', 'Password updated successfully !');

        }

    }


    
}
