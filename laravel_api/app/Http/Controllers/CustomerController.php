<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\SchoolEmployee;
use App\Models\period_price;
use App\Models\price_range;
use App\Models\SchoolStudent;
use App\Models\customer_read_terms_condition;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    protected function display_terms_conditions() {
        // Get the authenticated user
        $auth_user = Auth::guard('customer')->user()->id;

        // Retrieve the terms and conditions for the specific user
        $terms = customer_read_terms_condition::where('school_fk_id', $auth_user)
                    ->where('status', '=', '')
                    ->get();

        // Count the number of terms found
        $count_terms = $terms->count();

        // Return the terms and count
        return ['terms' => $terms, 'count_terms' => $count_terms];
    }

    public function customer_home() {
        // Call the display_terms_conditions() function and retrieve the data
        $terms_conditions = self::display_terms_conditions();
       

        // Pass the terms and count to the view
        return view('mainHome.customer.home', [
            'terms' => $terms_conditions['terms'],
            'count_terms' => $terms_conditions['count_terms']
        ]);
    }


    public function customer_profile(){
        $terms_conditions = self::display_terms_conditions();
        return view('mainHome.customer.profile', [
            'terms' => $terms_conditions['terms'],
            'count_terms' => $terms_conditions['count_terms']
        ]);
    }

    public function customer_username(){
        $terms_conditions = self::display_terms_conditions();
        return view('mainHome.customer.username', [
            'terms' => $terms_conditions['terms'],
            'count_terms' => $terms_conditions['count_terms']
        ]);
    }

    public function customer_information(){
        $terms_conditions = self::display_terms_conditions();
        return view('mainHome.customer.myInformation', [
            'terms' => $terms_conditions['terms'],
            'count_terms' => $terms_conditions['count_terms']
        ]);
    }

    public function customer_password(){
        $terms_conditions = self::display_terms_conditions();
        return view('mainHome.customer.password', [
            'terms' => $terms_conditions['terms'],
            'count_terms' => $terms_conditions['count_terms']
        ]);
    }

    public function editInfo(Request $request) {
        $auth_user_id = Auth::guard('customer')->user()->id;
    
        // Log incoming request data
        Log::info($request->all());
    
        $request->validate([
            'school_name' => 'required|string',
            'phone' => 'required|numeric|unique:customers,phone,' . $auth_user_id . '|unique:share_holders,phone,' . $auth_user_id ,
            'email' => 'required|email|unique:customers,email,' . $auth_user_id . '|unique:share_holders,email,' . $auth_user_id,
            'country' => 'required|string',
        ]);
    
        Customer::where('id', $auth_user_id)->update($request->only(['school_name', 'phone', 'email', 'country']));
    
        return redirect()->back()->with('info', 'Data updated successfully!');
    }
    
    public function customer_submit_username(Request $request){

        $request->validate([
            'username' => [
                'required','string','between:8,32',
                Rule::unique('customers')->ignore(Auth::guard('customer')->user()->username,'username')
            ]
        ]);

        $username=$request->username;
        $auth_user_id=Auth::guard('customer')->user()->id;

        Customer::where('id', $auth_user_id)->update(['username' => $username]);

        return redirect()->back()->with('info','Username is updated well !');

    }


    public function customer_submit_password(Request $request)
    {
        // Validate the form input
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the authenticated user
        $customer = Auth::guard('customer')->user();

        // Check if the provided current password matches the hashed password in the database
        if (!Hash::check($request->current_password, $customer->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match'])->withInput();
        }

        // Check if the new password is the same as the current password
        if ($request->current_password === $request->new_password) {
            return redirect()->back()->withErrors(['new_password' => 'New password cannot be the same as the current password'])->withInput();
        }

        // Update the user's password with the new password (hash it before saving)
        $customer->password = Hash::make($request->new_password);
        $customer->save();

        // Redirect back with success message
        return redirect()->back()->with('info', 'Password changed successfully');
    }

    public function logo(){
        $terms_conditions = self::display_terms_conditions();
        $customer = Auth::guard('customer')->user(); // Get the authenticated customer
        return view('mainHome.customer.logo' ,[
            'customer'=>$customer ,
            'terms' => $terms_conditions['terms'],
            'count_terms' => $terms_conditions['count_terms']
        ]);
    }

    public function customer_update_logo(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $customer = auth()->guard('customer')->user(); // Assuming you're using authentication to get the logged-in customer
    
        // Store the image
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images', 'public'); // Save in storage/app/public/profile_images
            
            // Update the customer's profile image in the database
            $customer->image = $path;
            $customer->save();
    
            return redirect()->back()->with([
                'success' => "Image uploaded !",
                'image_url' => asset('storage/' . $path) // Return the new image URL
            ]);
        }
    
        return redirect()->back()->with('success', 'Image upload failed');
    
    }

    //terms and condition
    public function customer_terms_condition(){
        $auth_user=Auth::guard('customer')->user()->id;
        $terms=customer_read_terms_condition::where('school_fk_id',$auth_user)->where('status','=','')->get();
        $count_terms=$terms->count();
        $terms_not_equal_to_null=customer_read_terms_condition::where('school_fk_id',$auth_user)->where('status','!=','')->count();

        if( $terms_not_equal_to_null == 0){
            toastr()->info('Terms & conditions read , do any other action you want !',['timeOut' => 5000]);
        } 

        return view('mainHome.customer.terms_condition',compact('terms','count_terms'));

    }

    public function customer_submit_terms_condition($terms){
        $auth_user=Auth::guard('customer')->user()->id;
        $terms=customer_read_terms_condition::where('school_fk_id',$auth_user)->where('terms','=',$terms);
        $terms->update(['status'=>'Read']);

        $count_terms=customer_read_terms_condition::all()->where('school_fk_id',$auth_user)->count();

        return redirect()->back()->with('terms_count',$count_terms);

    }

    //all schools employees and students
    public function customer_employees_students(){
        $terms_conditions = self::display_terms_conditions();
        $school_id=Auth::guard('customer')->user()->id;
        $school_employees = SchoolEmployee::where('school_fk_id',$school_id)->get();
        $school_students = SchoolStudent::where('school_fk_id',$school_id)->get();

        $school_employees_count=$school_employees->count();
        $school_students_count=$school_students->count();

        foreach ($school_employees as $data_count) {
            if ($data_count->firstname == '' && $data_count->lastname == '') {
                $school_employees_count = 0;
            }else{
                $school_employees_count;
            }
        }

        return view('mainHome.customer.school_employees_students', [
            'employees' => $school_employees,
            'count' => 1,
            'students' => $school_students,
            'terms' => $terms_conditions['terms'],
            'count_terms' => $terms_conditions['count_terms'],
            'employees_count' => $school_employees_count,
            'students_count' => $school_students_count
        ]);
    }

    //payment plan
    public function customer_payment_plan(){
        $terms_conditions = self::display_terms_conditions();

        $period_price = period_price::all()->where('period','Monthly')->get('price');
        $price_range = price_range::all();
        // dd($price_range);

        return view('mainHome.customer.payment_plan', [
            'period_price' => $period_price,
            'price_range' => $price_range,
            'terms' => $terms_conditions['terms'],
            'count_terms' => $terms_conditions['count_terms'],
        ]);
    }

    //customer(school) Ask_question 
    public function customer_ask_question(){
        $terms_conditions = self::display_terms_conditions();
        return view('mainHome.customer.ask_question', [
            'terms' => $terms_conditions['terms'],
            'count_terms' => $terms_conditions['count_terms'],
        ]);
    }

    public function customer_open_app($id){
        $school_id = $id;
        return redirect()->route('school.open', ['school_id' => $school_id]);
    }

    public function logout(){
        // Check which guard is currently authenticated
        if (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout(); // Logout admin
        }

        // Redirect to login form
        return redirect()->route('main.login.page');
    }


}
