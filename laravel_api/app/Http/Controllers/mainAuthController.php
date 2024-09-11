<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mainContact;
use App\Models\mainSubscriber;
use App\Models\ShareHolder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\period_price;
use App\Models\price_range;
use App\Models\Customer;
use App\Models\AllowCustomerToRegiter;
use App\Models\CustomerPartialRegister;
use Illuminate\Validation\Rule;
use App\Mail\CustomerToRegiterMail;

class mainAuthController extends Controller
{
    public function login(){
        return view('mainHome.auth.login')->with('hideFooter',true);
    }

    public function forgot_password(){
        return view('mainHome.auth.forgot-password')->with('hideFooter',true);
    }

    public function home(){
        return view('mainHome.pages.welcome');
    }

    public function about_us(){
        return view('mainHome.pages.about');
    }

    public function services(){
        return view('mainHome.pages.service');
    }

    public function pricing(){

        $period_price = period_price::all()->where('period','Monthly')->get('price');
        $price_range = price_range::all();
        // dd($price_range);
        return view('mainHome.pages.pricing',compact('period_price','price_range'));

    }

    public function contact(){
        return view('mainHome.pages.contact');
    }

    public function send_mail_to_register(){
        return view('mainHome.auth.mail_toRegister')->with('hideFooter',true);
    }

    public function SubmitContact(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        mainContact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect()->back()->with('success','message sent , We\'ll reply to you soon');
    }

    public function submit_subscription_email(Request $request){
        
        try {
            $request->validate([
                'email' => 'required|email|unique:main_subscribers',
            ], [], [], 'subscription');
            
            mainSubscriber::create([
                'email' => $request->email,
            ]);
            
            return redirect()->back()->with(['success' => 'Subscription successful !']);

        } catch (ValidationException $e) {
            
            return redirect()->back()->with(['error' => $e->errors()['subscription']]);
        
        }

    }

    public function submit_login(Request $request){
        
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string',
        ],[
            'username.required' =>'',
            'password.required' =>''
        ]);

        if (Auth::guard('shareHolder')->attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect()->route('main.shareHolder.dashboard');

        }else{

            return redirect()->back()->with('error','Invalid Username or Password ,try again !');

        }

    }

    public function logout(){

        // Check which guard is currently authenticated
        if (Auth::guard('shareHolder')->check()) {
            Auth::guard('shareHolder')->logout(); // Logout admin
        } 

        // Redirect to login form
        return redirect()->route('main.login.page');

    }

    public function panel_home(){
        $customer_count=collect(Customer::all())->count();
        return view('mainHome.shareHolder.home',compact('customer_count'));
    }

    public function shareHolder_profile(){
        return view('mainHome.shareHolder.profile');
    }

    public function shareHolder_username(){
        return view('mainHome.shareHolder.username');
    }

    public function shareHolder_information(){
        return view('mainHome.shareHolder.myInformation');
    }

    public function shareHolder_password(){
        return view('mainHome.shareHolder.password');
    }

    public function editInfo(Request $request){
        

        // $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'gender' => 'required|in:Male,Female',
        //     'phone' => 'required|numeric|unique:users,phone|unique:admins,phone',
        //     'email' => 'required|email|unique:users,email|unique:admins,email',
        //     'username' => 'required|string|between:8,32|unique:users,username|unique:admins,username',
        //     'dob' => 'required|string',
        // ]);

        $auth_user_id=Auth::guard('shareHolder')->user()->id;
        $fname=$request->firstname;
        $lname=$request->lastname;
        $gender=$request->gender;
        $phone=$request->phone;
        $email=$request->email;
        $uname=$request->username;
        $dob=$request->dob;

        $user=ShareHolder::find($auth_user_id);
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

    public function shareHolder_submit_username(Request $request){

        $request->validate([
            'username' => [
                'required','string','between:8,32',
                Rule::unique('share_holders')->ignore(Auth::guard('shareHolder')->user()->username,'username')
            ]
        ]);

        $username=$request->username;
        $auth_user_id=Auth::guard('shareHolder')->user()->id;

        ShareHolder::where('id', $auth_user_id)->update(['username' => $username]);

        return redirect()->back()->with('info','Username is updated well !');

    }


    public function shareHolder_submit_password(Request $request){
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


        if (!Hash::check($request->current_password, Auth::guard('shareHolder')->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match'])->withInput();
        }

        Auth::guard('shareHolder')->user()->update(['password' => Hash::make($request->new_password)]);

        // toastr()->info('Password changed successfully',['timeOut' => 5000]);
        
        return redirect()->back()->with('info','Password changed successfully');

    }

    public function customer_partial_register(Request $request){
        $request->validate([
            'school_name' => 'required|string',
            'email' => 'required|string|email|unique:customer_partial_registers,email|unique:admins,email|',
            // 'phone' => 'required|string|min:10|unique:customer_partial_registers,phone',
            'phone' => [
                    'required',
                    'string',
                    'min:10',
                    'unique:customer_partial_registers,phone',
                    'regex:/^(078|072|079|073)\d{6,}$/',
            ],
        
        ]);

        $school_name=$request->school_name;
        $email=$request->email;
        $phone=$request->phone;
        $country="Rwanda";

        $partial_register = CustomerPartialRegister::create([
            'school_name' => $school_name,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
        ]);

        AllowCustomerToRegiter::create([
            'customer_partial_reg_fk_id' => $partial_register->id,
            'status' => 'Not Allowed',
        ]);

        DB::table('allow_customer_to_regiters')
            ->where('customer_partial_reg_fk_id', $partial_register->id)
            ->update(['registration_done' => 'Not yet']);

        $registrar_id = $partial_register->id;

        $data=[
            'id' => $registrar_id,
            'school_name' => $school_name,
            'email' => $email,
            'phone' => $phone,
        ];

        Mail::to($email)->send(new CustomerToRegiterMail($data));

        return redirect()->back()->with('info','You’re registered! Please check your email for next steps');

    }

    public function customer_self_registrion($id,$name,$email,$phone){
        $customer_id = Crypt::decrypt($id);
        $school_name = Crypt::decrypt($name);
        $email = Crypt::decrypt($email);
        $phone = Crypt::decrypt($phone);

        $status = DB::table('allow_customer_to_regiters')
            ->where('customer_partial_reg_fk_id', $customer_id)
            ->first(['status', 'registration_done']);

        $statusValue = $status->status;
        $registrationDone = $status->registration_done;

        return view('mainHome.auth.customer_self_registration',compact('id','school_name','email','phone','statusValue','registrationDone'))->with('hideFooter',true);

    }

    // public function submit_customer_registration(Request $request,$id){
    //     $request->validate([
    //         'school_name' => 'required|string',
    //         'email' => 'required|string|email|unique:customers,email',
    //         'phone' => 'required|string|unique:customers,phone',
    //         'username' => 'required|string|min:8|unique:customers,username',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $customer_id =$id;
    //     $name = $request->school_name;
    //     $email = $request->email;
    //     $phone = $request->phone;
    //     $country = 'Rwanda';
    //     $username = $request->username;
    //     $password = bcrypt($request->password);
    //     $image = 'user.png';

    //     function generateStudentNumber($sequenceNumber) {
    //         // Prefix for the student number
    //         $prefix = 'SE';

    //         // Format the sequence number to be zero-padded to 5 digits
    //         $formattedNumber = str_pad($sequenceNumber, 5, '0', STR_PAD_LEFT);

    //         return $prefix . $formattedNumber;
    //     }

    //     // Example usage
    //     $sequenceNumber = 1; // This should be dynamically determined based on your logic
    //     $studentNumber = generateStudentNumber($sequenceNumber);

    //     Customer::create([
    //         'school_code' => $studentNumber,
    //         'school_name' => $name,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'country' => $country,
    //         'username' => $username,
    //         'password' => $password,
    //         'image' => $image,
    //     ]);

    //     DB::table('allow_customer_to_regiters')
    //         ->where('customer_partial_reg_fk_id', Crypt::decrypt($customer_id))
    //         ->update(['registration_done' => 'Done']);

    //     return redirect()->route('main.login.page')->with('info','Account created well,you can login !');

    // }

    public function submit_customer_registration(Request $request, $id) {
        $request->validate([
            'school_name' => 'required|string',
            'email' => 'required|string|email|unique:customers,email',
            'phone' => 'required|string|unique:customers,phone',
            'username' => 'required|string|min:8|unique:customers,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Retrieve the current sequence number and increment it
        $latestSchoolCode = DB::table('customers')->orderBy('school_code', 'desc')->value('school_code');

        if ($latestSchoolCode) {
            // Strip the 'SE' prefix and convert the number part to an integer
            $sequenceNumber = (int) substr($latestSchoolCode, 2);
        } else {
            // Initialize sequence number if no codes exist
            $sequenceNumber = 0;
        }

        // Increment the sequence number
        $newSequenceNumber = $sequenceNumber + 1;

        // Generate the new school code with the prefix
        $newSchoolCode = $this->generateStudentNumber($newSequenceNumber);

        // Create the customer
        Customer::create([
            'school_code' => $newSchoolCode,
            'school_name' => $request->school_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => 'Rwanda',
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'image' => 'user.png',
        ]);

        // Update the registration status
        DB::table('allow_customer_to_regiters')
            ->where('customer_partial_reg_fk_id', Crypt::decrypt($id))
            ->update(['registration_done' => 'Done']);

        // Redirect with success message
        return redirect()->route('main.login.page')->with('info', 'Account created successfully. You can now login!');
    }

    private function generateStudentNumber($sequenceNumber) {
        // Prefix for the student number
        $prefix = 'SE';

        // Format the sequence number to be zero-padded to 5 digits
        $formattedNumber = str_pad($sequenceNumber, 5, '0', STR_PAD_LEFT);

        return $prefix . $formattedNumber;
    }



    //view schools
    public function view_school(){
        return view('mainHome.shareHolder.view_schools');
    }

}
