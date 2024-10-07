<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Customer;

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

}
