<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\SendEmailToUserToRegister;
use App\Models\UserRole;
use App\Models\User;

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

    public function SubmitSelfRegister(Request $request,$email,$id){
        
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'phone' => 'required|numeric|min:10|unique:users,phone|unique:admins,phone',
            'username' => 'required|string|between:8,32|unique:users,username|unique:admins,username',
            'password' => 'required|string|between:8,32|confirmed',

            'dob' => 'required|string',
        ]);

        $fname=$request->firstname;
        $lname=$request->lastname;
        $gender=$request->gender;
        $phone=$request->phone;
        $email=$email;
        $uname=$request->username;
        $dob=$request->dob;
        $image='user.png';
        $user_role=$id;
        $password=bcrypt($request->password);

        $user=User::create([
            'firstname' => $fname,
            'lastname' => $lname,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'dob' => $dob,
            'image' => $image,
            'role_id' => $user_role,
            'username' => $uname,
            'password' => $password,
        ]);

        SendEmailToUserToRegister::where('email',$email)
            ->where('role_id',$user_role)
            ->update(['registered' =>'yes']);

        return redirect()->back()->with('success','Account created successfully !');

    }

    public function selectRole(){
        $user_id=Auth::guard('user')->user()->role_id;
        $get_user_role=UserRole::find($user_id);
        $user_role=$get_user_role->role_name;

        return view('users.cover',compact('user_role'));
    }

    public function home(){
        $user_id=Auth::guard('user')->user()->role_id;
        $get_user_role=UserRole::find($user_id);
        $user_role=$get_user_role->role_name;

        return view('users.home',compact('user_role'));
    }


}
