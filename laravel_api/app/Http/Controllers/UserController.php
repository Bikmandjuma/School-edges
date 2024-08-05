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
            $user_role_id = Crypt::decrypt($user_role);
        } catch (\Exception $e) {
            return abort(404); // Invalid or expired token
        }

        $user_role_data = UserRole::find($user_role_id);
        $user_role_name = $user_role_data['role_name'];

        $record_count = SendEmailToUserToRegister::where('email','=',$email)->where('registered','=','not yet')->count();
        return view('users.UserSelfRegister',compact('email','record_count','user_role_name','user_role_id'));
    }

    public function SubmitSelfRegister(Request $request){
        
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|numeric|min:10|unique:users,phone|unique:admins,phone',
            'username' => 'required|string|between:8,32',
            'password' => 'required|string|between:8,32',
            'dob' => 'required|string',
        ]);

        $fname=$request->firstname;
        $lname=$request->lastname;
        $gender=$request->gender;
        $phone=$request->phone;
        $email=$request->email;
        $uname=$request->username;
        $dob=$request->dob;
        $user_role=$request->role_id;
        $password=crypt($request->password);


    }


}
