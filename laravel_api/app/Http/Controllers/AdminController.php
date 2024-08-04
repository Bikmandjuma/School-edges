<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\SendEmailToUserToRegister;
use App\Mail\emailToUserToRegister;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function social_media(){
        return view('admin.social_media');
    }

    public function deleteProfile($id){
        $admin_id=$id;
        admin::find($admin_id)->delete();
        return redirect()->back()->with('profile_deleted','Profile deleted successfully !');
    }

    public function password(Request $request){
        $request->validate ([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::guard('admin')->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match'])->withInput();
        }

        Auth::guard('admin')->user()->update(['password' => Hash::make($request->new_password)]);

        toastr()->info('Password changed successfully',['timeOut' => 5000]);
        
        return redirect()->back();
    }

    public function editInfo(Request $request,$id){
        
        // $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'gender' => 'required|string',
        //     'phone' => 'required|string|exists:users',
        //     'email' => 'required|string|email',
        //     'username' => 'required|string|between:8,32',
        //     'dob' => 'required|string',
        // ]);

        $admin_id=$id;
        $fname=$request->firstname;
        $lname=$request->lastname;
        $gender=$request->gender;
        $phone=$request->phone;
        $email=$request->email;
        $uname=$request->username;
        $dob=$request->dob;

        $user=Admin::find($admin_id);
        $user->firstname=$fname;
        $user->lastname=$lname;
        $user->gender=$gender;
        $user->phone=$phone;
        $user->email=$email;
        $user->dob=$dob;
        $user->username=$uname;
        $user->save();

        toastr()->info("Data updated successfully !", ['timeOut' =>5000]);

        return redirect()->back();

    }

    public function myInformation(){
        return view('admin.myInformation');
    }

    public function show_password(){
        return view('admin.Password');
    }

    public function submit_social_media(Request $request){
        $request->validate([
            'phone' => 'required|string',
            'email' => 'required|email|exists:admins,email',
            'twitter' => 'required|string|url',
            'facebook' => 'required|string|url',
            'linkedin' => 'required|string|url',
            'whatsapp' => 'required|string|unique:users,phone',
            'instagram' => 'required|string|url',
        ]);
    }

    public function view_users(){
        $count_no=1;
        $users_data=User::all();
        return view('admin.view_users',compact('users_data','count_no'));
    }

    public function registerUserByInformation(){
        return view('admin.registerUserByInfo');
    }

    public function registerUserByEmail(){
        $count=1;
        $email_user=SendEmailToUserToRegister::all();
        $count_email_user=collect($email_user)->count();
        $data_email=SendEmailToUserToRegister::all()->where('registered','==','not yet');
        $data_count_email=collect($data_email)->count();

        

        return view('admin.registerUserByEmail',compact('count_email_user','data_email','data_count_email','count'));
    }

    public function submitUserEmailToRegister(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email|unique:admins,email|unique:send_email_to_user_to_registers,email'
        ]);

        $email = $request->email;

        $data = [
            'email' => $email,
        ];

        Mail::to($email)->send(new emailToUserToRegister($data));

        SendEmailToUserToRegister::create([
            'email' => $email,
            'registered' => 'not yet'
        ]);

        toastr()->info('Email sent successfully !',['timeOut' => 5000]);

        return redirect()->back();

    }

    public function viewUserData(){
        return view('admin.ViewSingleUserInfo');
    }


}
