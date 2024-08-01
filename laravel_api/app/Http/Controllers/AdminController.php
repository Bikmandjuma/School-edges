<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    

}
