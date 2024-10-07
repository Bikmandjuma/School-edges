<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\validator;
use App\Models\SendEmailToUserToRegister;
use App\Mail\emailToUserToRegister;

class AdminController extends Controller{
    public function home(){
        $admin_count = Admin::all()->count();
        $normal_users = User::all()->count();
        $system_users = $admin_count + $normal_users;
        
        $onlineUsers =User::where('last_active_at', '>=', now()->subMinutes(5))->get();
        $count_onlineUsers=collect($onlineUsers)->count();

        $user_roles=DB::table('user_roles')
                    ->join('users','user_roles.id','=','users.role_id')
                    ->select('user_roles.*')
                    ->where('user_roles.role_name','=','Teacher')
                    ->get();
        $count_user_roles=collect($user_roles)->count();

        return view('admin.home',compact('count_onlineUsers','system_users','count_user_roles'));
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
        // Validate the request for specific fields

        $validator = Validator::make($request->all(), [
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Set a general error message if any required field is missing
            $errors = $validator->errors();
            
            // Check if any required field errors exist
            if ($errors->has('current-password') || $errors->has('new-password')) {
                return redirect()->back()->withErrors(['all_fields_required' => 'Please , all fields are required !']);
            }

            // Return specific errors if needed
            return redirect()->back()->withErrors($validator);
        }


        if (!Hash::check($request->current_password, Auth::guard('admin')->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match'])->withInput();
        }

        Auth::guard('admin')->user()->update(['password' => Hash::make($request->new_password)]);

        // toastr()->info('Password changed successfully',['timeOut' => 5000]);
        
        return redirect()->back()->with('info','Password changed successfully');
    }

    public function editInfo(Request $request,$id){
        
        // $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'gender' => 'required|in:Male,Female',
        //     'phone' => 'required|numeric|unique:users,phone|unique:admins,phone',
        //     'email' => 'required|email|unique:users,email|unique:admins,email',
        //     'username' => 'required|string|between:8,32|unique:users,username|unique:admins,username',
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

        // toastr()->info("Data updated successfully !", ['timeOut' =>5000]);

        return redirect()->back()->with('info','Data updated successfully !');

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
        $users_data = User::all();

        // Get the current time
        $now = now();

        // Determine online status for each user
        foreach ($users_data as $user) {
            // Check if the user was active within the last 5 minutes
            $user->is_online = $user->last_active_at >= $now->subMinutes(5);
            // Reset the time for the next comparison
            $now = now();
        }

        return view('admin.view_users', compact('users_data', 'count_no'));

    }

    public function registerUserByInformation(){
        $data_role_users=UserRole::all();
        return view('admin.registerUserByInfo',compact('data_role_users'));
    }

    public function registerUserByEmail(){
        $count=1;
        $email_user=SendEmailToUserToRegister::all();
        $count_email_user=collect($email_user)->count();
        $data_email=SendEmailToUserToRegister::all()->where('registered','=','not yet');

        $data_email_registered=SendEmailToUserToRegister::all()->where('registered','=','yes');
        $data_email_registered_count=collect($data_email_registered)->count();

        $data_count_email=collect($data_email)->count();

        $user_role_data=UserRole::all();

        return view('admin.registerUserByEmail',compact('count_email_user','data_email','data_count_email','count','data_email_registered_count','data_email_registered','user_role_data'));
    }

    public function submitUserEmailToRegister(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email|unique:admins,email|unique:send_email_to_user_to_registers,email',
            'role_name' => 'required'
        ]);

        $email = $request->email;
        $role_id = $request->role_name;

        $data = [
            'email' => $email,
            'user_role' => $role_id,
        ];

        Mail::to($email)->send(new emailToUserToRegister($data));

        SendEmailToUserToRegister::create([
            'email' => $email,
            'role_id' => $role_id,
            'registered' => 'not yet'
        ]);

        // toastr()->info('Email sent successfully !',['timeOut' => 5000]);

        return redirect()->back()->with('success','Email sent successfully !');

    }

    public function viewUserData(){
        return view('admin.ViewSingleUserInfo');
    }

    public function registerSystemUser(Request $request){
        
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'phone' => 'required|numeric|min:10|unique:users,phone|unique:admins,phone',
            'email' => 'required|email|unique:users,email|unique:admins,email',
            'username' => 'required|string|between:8,32|unique:users,username|unique:admins,username',
            'password' => 'required|string|between:8,32|confirmed',
            'role_id' => 'required|exists:user_roles,id',
            'dob' => 'required|string',
        ]);

        $fname=$request->firstname;
        $lname=$request->lastname;
        $gender=$request->gender;
        $phone=$request->phone;
        $email=$request->email;
        $uname=$request->username;
        $dob=$request->dob;
        $image='user.png';
        $user_role=$request->role_id;
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
        
        // toastr()->info('User added successfully !',['timeOut' => 5000]);

        return redirect()->route('view_users')->with('info','User added successfully !');

    }

}
