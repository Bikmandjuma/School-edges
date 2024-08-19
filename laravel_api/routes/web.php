<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\mainAuthController;

Route::get('/school', function () {
    return view('homePage.home');
})->name('guest_homepage');

//start .. Main homepage , this code block is about mainpage
Route::get('login',[mainAuthController::class,'login'])->name('main.login.page');
Route::post('submit_login',[mainAuthController::class,'submit_login'])->name('main.submit.login');

Route::get('forgot-password-form',[mainAuthController::class,'forgot_password'])->name('main.forgot_password.page');
Route::get('send_mail_to_register',[mainAuthController::class,'send_mail_to_register'])->name('main.send_mail_toRegister.page');

Route::get('/',[mainAuthController::class,'home'])->name('main.home');
Route::get('/about-us',[mainAuthController::class,'about_us'])->name('main.about');
Route::get('/services',[mainAuthController::class,'services'])->name('main.services');
Route::get('/pricing',[mainAuthController::class,'pricing'])->name('main.pricing');
Route::get('/contact',[mainAuthController::class,'contact'])->name('main.contact');
Route::post('submit/contact',[mainAuthController::class,'SubmitContact'])->name('main.submit.contact');
Route::post('submit_subscription_email',[mainAuthController::class,'submit_subscription_email'])->name('main.submit_subscription_email');
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
    Route::get('home',[mainAuthController::class,'home'])->name('main.shareHolder.dashboard');
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



//School's users Controller
Route::group(['prefix'=>'user' , 'middleware'=>'user'],function(){
    Route::get('cover',[UserController::class,'selectRole'])->name('cover');
    Route::get('home',[UserController::class,'home'])->name('user.dashboard');
});
//School's users Controller



//user self registration
    Route::get('/system-user/registration/{encryptedEmail}/{user_role}', [UserController::class, 'showRegistrationForm'])->name('UserSelfRegistration.form');
    Route::post('/system-user/registrations/{email}/{id}', [UserController::class, 'SubmitSelfRegister'])->name('registration.submit');
