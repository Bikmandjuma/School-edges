<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\mainAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SchoolController;

Route::get('/school', function () {
    return view('homePage.home');
})->name('guest_homepage');

//start .. Main homepage , this code block is about mainpage
Route::get('login',[mainAuthController::class,'login'])->name('main.login.page');
Route::post('submit_login',[mainAuthController::class,'submit_login'])->name('main.submit.login');

Route::get('forgot-password-form',[mainAuthController::class,'forgot_password'])->name('main.forgot_password.page');
Route::get('send_mail_to_register',[mainAuthController::class,'send_mail_to_register'])->name('main.send_mail_toRegister.page');
Route::post('customer_partial_register',[mainAuthController::class,'customer_partial_register'])->name('main.customer_partial_register');

Route::get('/',[mainAuthController::class,'home'])->name('main.home');
Route::get('/about-us',[mainAuthController::class,'about_us'])->name('main.about');
Route::get('/services',[mainAuthController::class,'services'])->name('main.services');
Route::get('/pricing',[mainAuthController::class,'pricing'])->name('main.pricing');
Route::get('/contact',[mainAuthController::class,'contact'])->name('main.contact');
Route::post('submit/contact',[mainAuthController::class,'SubmitContact'])->name('main.submit.contact');
Route::post('submit_subscription_email',[mainAuthController::class,'submit_subscription_email'])->name('main.submit_subscription_email');
Route::get('/customer/self-registration/{id}/{school_name}/{email}/{phone}',[mainAuthController::class,'customer_self_registrion'])->name('main.customer_self_registrion');
Route::post('/submit_customer_registration/{id}',[mainAuthController::class,'submit_customer_registration'])->name('main.submit_customer_registration');
//end .. Main homepage , this code block is about mainpage

Route::get('/school/about-us',[homeController::class,'about_us'])->name('about_us');
Route::get('/school/service',[homeController::class,'service'])->name('service');
Route::get('/school/course',[homeController::class,'course'])->name('course');
Route::get('/school/teachers',[homeController::class,'teachers'])->name('teachers');
Route::get('/school/contact',[homeController::class,'contact'])->name('contact');
Route::post('submitContact',[homeController::class,'guestSubmitMessageContact'])->name('guestSubmitcontact');

Route::get('/school/login',[AuthController::class,'login_form'])->name('login.form');
Route::get('/school/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/school/forgot-password',[AuthController::class,'forgotpswd_form'])->name('forgotpswd.form');
Route::get('/school/reset/password/code/{email}/{code}',[AuthController::class,'reset_password_code']);
Route::post('/school/codeCheck/{email}/{code}',[AuthController::class,'codeCheck'])->name('codeCheck');
Route::get('/school/reset/password/{email}/{code}',[AuthController::class,'resetPassword'])->name('resetPassword');

Route::post('/school/submit/reset/password/{email}/{code}',[AuthController::class,'submitResetPassword'])->name('submitResetPassword');

Route::post('/school/forgot_password_submission',[AuthController::class,'submit_forgot_password'])->name('submit-forgot-password');

Route::post('/school/login-post',[AuthController::class,'login_functionality'])->name('post_login');
Route::get('admin-home',[AdminController::class,'home']);


//mainController panel
Route::group(['prefix'=>'shareHolder' , 'middleware'=>'shareHolder'],function(){
    
    Route::get('home',[mainAuthController::class,'panel_home'])->name('main.shareHolder.dashboard');
    
    Route::get('logout',[mainAuthController::class,'logout'])->name('main.logout');
    
    Route::get('profile',[mainAuthController::class,'shareHolder_profile'])->name('main.show.profile');
    
    Route::get('information',[mainAuthController::class,'shareHolder_information'])->name('main.show.myInformation');
    
    Route::get('username',[mainAuthController::class,'shareHolder_username'])->name('main.show.username');
    
    Route::post('submit_username',[mainAuthController::class,'shareHolder_submit_username'])->name('main.submit.username');
    
    Route::get('password',[mainAuthController::class,'shareHolder_password'])->name('main.show.password');
    
    Route::post('submit_password',[mainAuthController::class,'shareHolder_submit_password'])->name('main.submit.password');
    
    Route::post('edit_info',[mainAuthController::class,'editInfo'])->name('main.editInfo');
    
    Route::get('view-school',[mainAuthController::class,'view_school'])->name('main.view_school');
    
    Route::get('view_single_school_info/{id}',[mainAuthController::class,'view_single_school_info'])->name('main.view_single_school_info');
    
    Route::get('school_not_allowed_yet',[mainAuthController::class,'school_not_allowed_yet'])->name('main.school_not_allowed_yet');

    Route::get('allowed_school_to_register/{id}',[mainAuthController::class,'allowed_school_to_register'])->name('main.allowed_school_to_register');

    Route::get('edit_customer_info/{id}',[mainAuthController::class,'Customer_edit_info'])->name('main.Customer_edit_info');

    Route::get('customer_employee_student/{id}',[mainAuthController::class,'Customer_employee_student'])->name('main.Customer_employee_student');

    Route::get('customer_payment_status/{id}',[mainAuthController::class,'Customer_payment_status'])->name('main.Customer_payment_status');

    Route::post('submit_edit_customer_info/{id}',[mainAuthController::class,'edit_customer_info'])->name('main.editCustomerInfo');

});
//end mainController panel


//School's admin Controller
Route::group(['prefix'=>'admin' , 'middleware'=>'admin'],function(){
    Route::get('home',[AdminController::class,'home'])->name('dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('profile.page');
    Route::get('delete-profile/{id}',[AdminController::class,'deleteProfile'])->name('AdminDeleteProfile');
    Route::post('edit-info/{id}',[AdminController::class,'editInfo'])->name('editInfo');
    Route::post('post_password',[AdminController::class,'password'])->name('password');
    Route::get('password',[AdminController::class,'show_password'])->name('show.password');
    Route::get('information',[AdminController::class,'myInformation'])->name('myInformation');
    Route::get('social-media',[AdminController::class,'social_media'])->name('social_media');
    Route::post('submit_social_media',[AdminController::class,'submit_social_media'])->name('submit_social_media');
    Route::get('system-users',[AdminController::class,'view_users'])->name('view_users');
    Route::get('registerUserByInformation',[AdminController::class,'registerUserByInformation'])->name('registerUserByInformation');
    Route::get('registerUserByEmail',[AdminController::class,'registerUserByEmail'])->name('registerUserByEmail');
    Route::post('submitUserEmailToRegister',[AdminController::class,'submitUserEmailToRegister'])->name('submitUserEmailToRegister');
    Route::get('view-user-data/{id}', [AdminController::class, 'viewUserData'])->name('viewUserData');
    Route::post('register/system-user', [AdminController::class, 'registerSystemUser'])->name('register-system-user');

});
//end School's admin Controller

//Start of customer block's route
Route::group(['prefix'=>'customer' , 'middleware'=>'customer'],function(){
    Route::get('home', [CustomerController::class, 'customer_home'])->name('main.customer.dashboard');
    Route::get('profile',[CustomerController::class,'customer_profile'])->name('main.customer.show.profile');
    Route::get('information',[CustomerController::class,'customer_information'])->name('main.customer.show.myInformation');
    Route::get('username',[CustomerController::class,'customer_username'])->name('main.customer.show.username');
    Route::post('submit_username',[CustomerController::class,'customer_submit_username'])->name('main.customer.submit.username');
    Route::get('password',[CustomerController::class,'customer_password'])->name('main.customer.show.password');
    Route::post('submit_passwords',[CustomerController::class,'customer_submit_password'])->name('main.customer.submit.password');
    Route::post('edit_info',[CustomerController::class,'editInfo'])->name('main.customer.editInfo');
    Route::get('logo',[CustomerController::class,'logo'])->name('main.customer.logo');
    Route::post('customer_logo',[CustomerController::class,'customer_update_logo'])->name('main.customer.update.logo');
    Route::get('terms_condition', [CustomerController::class, 'customer_terms_condition'])->name('main.customer.terms_condition');
    Route::get('terms_condition/{terms}', [CustomerController::class, 'customer_submit_terms_condition'])->name('main.submit.terms_condition');
    Route::get('employees_students', [CustomerController::class, 'customer_employees_students'])->name('main.customer.employees_students');
    Route::get('payment_plan', [CustomerController::class, 'customer_payment_plan'])->name('main.customer.payment_plan');
    Route::get('open_app/{id}', [CustomerController::class, 'customer_open_app'])->name('main.customer.open_app');
    Route::get('ask_question', [CustomerController::class, 'customer_ask_question'])->name('main.customer.ask_question');
    Route::get('logout', [CustomerController::class, 'logout'])->name('main.customer.logout');
});
//end of customer block's route


//Single_School routes
Route::group(['prefix'=>'school' , 'middleware'=>'school_employee'],function(){
    Route::get('admin_Self_registration/{school_id}', [SchoolController::class, 'school_employee_admin_Self_registration'])->name('school_employee.admin_self_registration');
    Route::post('admin_submit_registration/{school_id}', [SchoolController::class, 'school_employee_admin_submit_registration'])->name('school_employee_admin_submit_registration_form');
    Route::get('home/{school_id}', [SchoolController::class, 'school_employee_account_home'])->name('school_employee.dashboard');
    Route::get('manage_role/{school_id}', [SchoolController::class, 'school_employee_manage_role'])->name('school_employee_manage_role');
    Route::post('add_role/{school_id}', [SchoolController::class, 'school_employee_add_new_role'])->name('school_employee_add_new_role');
    Route::post('school_employee_update_role', [SchoolController::class, 'school_employee_update_role'])->name('school_employee_update_role');
    Route::get('school_employee_add_user/{school_id}', [SchoolController::class, 'school_employee_add_user'])->name('school_employee_add_user');
    Route::post('school_employee_submit_user_data/{school_id}', [SchoolController::class, 'school_employee_submit_user_data'])->name('school_employee_submit_user_data');
    Route::get('school_employee_view_user/{school_id}', [SchoolController::class, 'school_employee_view_user'])->name('school_employee_view_user');
    Route::get('logout/{school_id}', [SchoolController::class, 'school_employee_account_logout'])->name('school_employee.logout');
});
//end of single school routes

//single_school_page
Route::group(['prefix' => ''], function() {
    Route::get('home/{school_id}', [SchoolController::class, 'open'])->name('school.open');
    Route::get('about/{school_id}', [SchoolController::class, 'about_home_page'])->name('school.about_home_page');
    Route::get('news/{school_id}', [SchoolController::class, 'news_home_page'])->name('school.news_home_page');
    Route::get('student/studying/{school_id}', [SchoolController::class, 'student_studying_home_page'])->name('school.student_studying_home_page');
    Route::get('student/living/{school_id}', [SchoolController::class, 'student_living_home_page'])->name('school.student_living_home_page');
    Route::get('administration/{school_id}', [SchoolController::class, 'administration_home_page'])->name('school.administration_home_page');
    Route::get('contact/{school_id}', [SchoolController::class, 'contact_home_page'])->name('school.contact_home_page');
    Route::get('login/{school_id}', [SchoolController::class, 'login_home_page'])->name('school.login_home_page');
    Route::post('submit_login/{school_id}', [SchoolController::class, 'school_employee_submit_login'])->name('school.submit.login_home_page');

    Route::get('forgot-password-form/{school_id}', [SchoolController::class, 'forgot_password_home_page'])->name('school.forgot_password_home_page');
});
//end single_school_page

//School's users Controller
Route::group(['prefix'=>'user' , 'middleware'=>'user'],function(){
    Route::get('cover',[UserController::class,'selectRole'])->name('cover');
    Route::get('home',[UserController::class,'home'])->name('user.dashboard');
});
//School's users Controller

//user self registration
    Route::get('/system-user/registration/{encryptedEmail}/{user_role}', [UserController::class, 'showRegistrationForm'])->name('UserSelfRegistration.form');
    Route::post('/system-user/registrations/{email}/{id}', [UserController::class, 'SubmitSelfRegister'])->name('registration.submit');
