<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function customer_home(){
        return view('mainHome.customer.home');
    }

    public function customer_profile(){
        return view('mainHome.customer.profile');
    }

    public function customer_username(){
        return view('mainHome.customer.username');
    }

    public function customer_information(){
        return view('mainHome.customer.myInformation');
    }

    public function customer_password(){
        return view('mainHome.customer.password');
    }

    public function editInfo(Request $request) {
        $auth_user_id = Auth::guard('customer')->user()->id;
    
        // Log incoming request data
        Log::info($request->all());
    
        $request->validate([
            'school_name' => 'required|string',
            'phone' => 'required|numeric|unique:customers,phone,' . $auth_user_id . '|unique:share_holders,phone,' . $auth_user_id . '|unique:admins,phone,' . $auth_user_id,
            'email' => 'required|email|unique:customers,email,' . $auth_user_id . '|unique:share_holders,email,' . $auth_user_id . '|unique:admins,email,' . $auth_user_id,
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
        $customer = Auth::guard('customer')->user(); // Get the authenticated customer
        return view('mainHome.customer.logo' , compact('customer'));
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
        return view('mainHome.customer.terms_condition');
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
