<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController as Signup;
use App\Http\Controllers\MailerController as Mailer;
use App\Http\Controllers\Dashboard\DashboardController as Dashboard;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('teacher/dashboard');
});
Route::get('/signup',[Signup::class,'index']);
Route::post('/save',[Signup::class,'save']);
Route::post('/getState',[Signup::class,'getState']);
Route::post('/getCity',[Signup::class,'getCity']);
Route::get('/getAllUsers',[Signup::class,'getAllUsers']);
Route::get('/otp',[Signup::class,'otp']);
Route::get('/send-otp/{id}',[Signup::class,'sendOTP']);
Route::get('/otp/{id}',[Signup::class,'otp']);
Route::post('/check-otp/{id}',[Signup::class,'checkOtp']);
Route::get('/compose-email',[Mailer::class,'composeEmail']);
Route::group(['prefix'=>'/dashboard'],function (){
    Route::get('/',[Dashboard::class,'index']);

});
;
