<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function profile(){
        $activeTab = 'profile-overview';
        return view('admin.profile',compact('activeTab'));
    }

    public function deleteProfile($id){
        $admin_id=$id;
        admin::find($admin_id)->delete();
        return redirect()->back()->with('profile_deleted','Profile deleted successfully !');
    }

    public function password(){
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match'])->withInput();
        }

        Auth::user()->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('home')->with('status', 'Password changed successfully');
    }

    public function editInfo(Request $request,$id){
        $admin_id=$id;

        // $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'gender' => 'required|string',
        //     'phone' => 'required|string|exists:users',
        //     'email' => 'required|string|email',
        //     'username' => 'required|string|between:8,32',
        //     'dob' => 'required|string',
        // ]);

        $fname=$request->firstname;
        $lname=$request->lastname;
        $gender=$request->gender;
        $phone=$request->phone;
        $email=$request->email;
        $uname=$request->username;
        $dob=$request->dob;

        // dd($fname);

        $user=Admin::find($admin_id);
        $user->firstname=$fname;
        $user->lastname=$lname;
        $user->gender=$gender;
        $user->phone=$phone;
        $user->email=$email;
        $user->dob=$dob;
        $user->username=$uname;
        $user->save();

        return redirect()->back()->with('data-udated','Info updated successfully !')->with('activeTab', 'profile-edit');

    }

}
