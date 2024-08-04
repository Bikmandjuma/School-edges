<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userSelfRegester($email){
        $email=$email;
        
    }

     public function showRegistrationForm($encryptedEmail)
    {
        try {
            // Decrypt the email address
            $email = Crypt::decrypt($encryptedEmail);
        } catch (\Exception $e) {
            return abort(404); // Invalid or expired token
        }
        
        return view('users.UserSelfRegister',compact('email'));
    }

}
