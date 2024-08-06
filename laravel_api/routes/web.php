<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('homePage.home');
})->name('guest_homepage');

Route::get('about-us',[homeController::class,'about_us'])->name('about_us');
Route::get('service',[homeController::class,'service'])->name('service');
Route::get('course',[homeController::class,'course'])->name('course');
Route::get('teachers',[homeController::class,'teachers'])->name('teachers');
Route::get('contact',[homeController::class,'contact'])->name('contact');
Route::post('submitContact',[homeController::class,'guestSubmitMessageContact'])->name('guestSubmitcontact');

Route::get('login',[AuthController::class,'login_form'])->name('login.form');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('forgot-password',[AuthController::class,'forgotpswd_form'])->name('forgotpswd.form');
Route::post('forgot_password_submission',[AuthController::class,'submit_forgot_password'])->name('submit-forgot-password');

Route::post('login-post',[AuthController::class,'login_functionality'])->name('post_login');
Route::get('admin-home',[AdminController::class,'home']);

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

});


//user self registration
    Route::get('/system-user/registration/{encryptedEmail}/{user_role}', [UserController::class, 'showRegistrationForm'])->name('UserSelfRegistration.form');
    Route::post('/system-user/registrations/{email}/{id}', [UserController::class, 'SubmitSelfRegister'])->name('registration.submit');
