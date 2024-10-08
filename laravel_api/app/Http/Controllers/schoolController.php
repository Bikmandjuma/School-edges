<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\UserRole;
use App\Models\SchoolEmployee;

class schoolController extends Controller
{
    public function open($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.Home",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);

    }

    //About in homepage
    public function about_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.About",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //New in homepage
    public function news_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.News",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Student studying in homepage
    public function student_studying_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.Student_studying",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Student living in homepage
    public function student_living_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.Student_living",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Administration living in homepage
    public function administration_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.Leaders_Administration",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Administration living in homepage
    public function contact_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Landing_pages.Contact",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
        ]);
    }

    //Administration living in homepage
    public function login_home_page($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.Auth.Login",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
            'hideFooter' => true,
        ]);

        $project_name = $request->project_name;
        $description = $request->description;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $project_category = $request->project_category;
        $status = $request->status;

        $updateData=DB::table('projects')->where('project_id',$project_id);
        $updateData->update([
            'project_name' => $project_name,
            'description' => $description,
            'start_date' => $start_date,
            'project_category' => $project_category,
            'end_date' => $end_date,
            'status' => $status,
        ]);
    }

    public function forgot_password_home_page($school_id){
         $school_data = Customer::findOrFail(Crypt::decrypt($school_id));
        
        return view("Single_School.auth.forgot_password",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
            'hideFooter' =>true
        ]);
    }

    public function school_employee_submit_login(Request $request,$school_id){
        
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string',
        ],[
            'username.required' =>'',
            'password.required' =>''
        ]);

        $school_id = Crypt::decrypt($school_id);
        
        if (Auth::guard('school_employee')->attempt(['username' => $request->username, 'password' => $request->password,'school_fk_id' => $school_id])) {
            
            $auth_user = Auth::guard('school_employee')->user()->id;

            //check if school's admin has full info
            $school_Admin=SchoolEmployee::where('school_fk_id',$school_id)->where('id',$auth_user)->get();

            foreach ($school_Admin as $user_data) {
                if ($user_data->firstname == null and $user_data->lastname == null ) {
                    return redirect()->route('school_employee.admin_self_registration',Crypt::encrypt($school_id))->with('info',"fill missed info first !");
                }else{
                    return redirect()->route('school_employee.dashboard',Crypt::encrypt($school_id));
                }
            }

        }else{

            return redirect()->back()->with('error','Invalid Username or Password ,try again !');

        }

    }

    //admin self registration before login
    public function school_employee_admin_Self_registration($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_ids = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_ids);

        return view("Single_School.Users_acccount.Employee.admin_self_registration",[
            'school_id' => $school_data->id,
            'school_username' => $school_data->username,
        ]);

    }

    //admin self registration before login
    public function school_employee_admin_submit_registration(Request $request, $school_id){
        // Retrieve the terms and conditions for the specific user
        $school_id = $school_id;
        $auth_id = Auth::guard('school_employee')->user()->id;
        $school_data = Customer::findOrFail($school_id);

        $request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'username'=>'required|min:8|string|unique:school_employees,username|unique:customers,username|unique:share_holders,username',
            'email'=>'required|string|email|unique:school_employees,email|unique:customers,email|unique:share_holders,email',
            'phone' => [
                    'required',
                    'string',
                    'min:10',
                    'unique:school_employees,phone',
                    'regex:/^(078|072|079|073)\d{6,}$/',
                    'unique:customers,phone',
                    'unique:share_holders,phone',
            ],
            'dob'=>'required|string',
            'gender'=>'required|string',
            'password'=>'required|string|min:8|confirmed',
            'password_confirmation'=>'required|string|min:8',
        ]);

        SchoolEmployee::where('id',$auth_id)->where('school_fk_id',$school_id)
        ->update([
            'firstname' => $request->firstname,
            'middle_name' => $request->middle_name,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);
        
        return redirect()->route('school_employee.dashboard',Crypt::encrypt($school_id))->with([
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_logo' => $school_data->image,
            'info' => "Welcome ".$request->firstname." ".$request->lastname." !"
        ]);

    }


    public function school_employee_account_home($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_ids = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_ids);
        $school_employees_count = SchoolEmployee::where('school_fk_id',$school_ids)->count();

        return view("Single_School.Users_acccount.Employee.home",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_email' => $school_data->email,
            'school_phone' => $school_data->phone,
            'school_logo' => $school_data->image,
            'school_employees_count' => $school_employees_count,
        ]);

    }

    //manage role
    public function school_employee_manage_role($school_id){
        // Retrieve the terms and conditions for the specific user
        $school_ids = Crypt::decrypt($school_id);
        $school_data = Customer::findOrFail($school_ids);

        $role_data = UserRole::all();

        return view("Single_School.Users_acccount.Employee.role",[
            'school_id' => $school_data->id,
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
            'role_data' => $role_data
        ]);

    }

    public function  school_employee_add_new_role(Request $request,$school_id){
        // Retrieve the terms and conditions for the specific user
        $school_ids = $school_id;
        $school_data = Customer::findOrFail($school_ids);
        $request->validate([
            'role_name' => 'required|string|unique:user_roles,role_name'
        ]);
        UserRole::create([
            'role_name' => $request->role_name
        ]);

        return redirect()->route('school_employee_manage_role',Crypt::encrypt($school_data->id))->with([
            'school_id' => Crypt::encrypt($school_data->id),
            'school_name' => $school_data->school_name,
            'school_logo' => $school_data->image,
            'success' => "New role added successfully !",
        ]);

    }

    public function school_employee_update_role(Request $request){
        
         $request->validate([
        'role_id' => 'required|integer',
        'role_name' => 'required|string|max:255',
        ]);

        $role = UserRole::find($request->role_id);
        $role->role_name = $request->role_name;
        $role->save();

        return redirect()->back()->with('success', 'Role updated successfully.');

    }

    public function school_employee_account_logout(){

        $school_id = Auth::guard('school_employee')->user()->school_fk_id;

        // Check which guard is currently authenticated
        if (Auth::guard('school_employee')->check()) {
            Auth::guard('school_employee')->logout(); // Logout admin
        } 

        // Redirect to login form
        return redirect()->route('school.login_home_page',Crypt::encrypt($school_id));

    }

}
