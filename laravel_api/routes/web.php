<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('homePage.home');
})->name('guest_homepage');

Route::get('about-us',[homeController::class,'about_us'])->name('about_us');
Route::get('service',[homeController::class,'service'])->name('service');
Route::get('course',[homeController::class,'course'])->name('course');
Route::get('teachers',[homeController::class,'teachers'])->name('teachers');
Route::get('contact',[homeController::class,'contact'])->name('contact');

Route::get('login',[AuthController::class,'login_form'])->name('login.form');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('forgot-password',[AuthController::class,'forgotpswd_form'])->name('forgotpswd.form');
Route::post('login-post',[AuthController::class,'login_functionality'])->name('post_login');
Route::get('admin-home',[AdminController::class,'home']);

Route::group(['prefix'=>'admin' , 'middleware'=>'admin'],function(){
    Route::get('home',[AdminController::class,'home'])->name('dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('profile.page');
    Route::get('delete-profile/{id}',[AdminController::class,'deleteProfile'])->name('AdminDeleteProfile');
    Route::post('edit-info/{id}',[AdminController::class,'editInfo'])->name('editInfo');
});
