<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;

Route::get('/', function () {
    return view('welcome');
})->name('guest_homepage');

Route::get('about-us',[homeController::class,'about_us'])->name('about_us');
Route::get('service',[homeController::class,'service'])->name('service');
Route::get('course',[homeController::class,'course'])->name('course');
Route::get('teachers',[homeController::class,'teachers'])->name('teachers');
Route::get('contact',[homeController::class,'contact'])->name('contact');

Route::get('login',[AuthController::class,'login_form'])->name('login.form');
Route::get('forgot-password',[AuthController::class,'forgotpswd_form'])->name('forgotpswd.form');
Route::post('login-post',[AuthController::class,'login_functionality'])->name('post_login');

