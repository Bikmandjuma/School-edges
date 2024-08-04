<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\SendEmailToUserToRegister;


class UserController extends Controller
{
    public function showRegistrationForm($encryptedEmail){
        try {
            // Decrypt the email address
            $email = Crypt::decrypt($encryptedEmail);
        } catch (\Exception $e) {
            return abort(404); // Invalid or expired token
        }

        $record_count = SendEmailToUserToRegister::where('email','=',$email)->where('registered','=','not yet')->count();
        return view('users.UserSelfRegister',compact('email','record_count'));
    }


}
