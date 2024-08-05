<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\SendEmailToUserToRegister;
use App\Models\UserRole;

class UserController extends Controller
{
    public function showRegistrationForm($encryptedEmail,$user_role){
        try {
            // Decrypt the email address
            $email = Crypt::decrypt($encryptedEmail);
            $user_role = Crypt::decrypt($user_role);
        } catch (\Exception $e) {
            return abort(404); // Invalid or expired token
        }

        $user_role_data = UserRole::find($user_role);
        $user_role_name = $user_role_data['role_name'];

        $record_count = SendEmailToUserToRegister::where('email','=',$email)->where('registered','=','not yet')->count();
        return view('users.UserSelfRegister',compact('email','record_count','user_role_name'));
    }


}
