<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\EmailVerificationController;
use App\Http\Controllers\Api\Auth\ForgetPasswordController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Admin\RolesAndPermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);


Route::post('password/forget-password', [ForgetPasswordController::class, 'forgetPassword']);
Route::post('password/reset-password', [ResetPasswordController::class, 'passwordReset']);


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/profile', function(Request $request){
        return $request->user();
    });
    Route::put('profile', [ProfileController::class, 'update']);
    Route::post('email_verification', [EmailVerificationController::class, 'email_verification']);
    Route::get('email_verification', [EmailVerificationController::class, 'send_email_verified']);
    Route::post('logout', [LogoutController::class, 'logout']);
});

Route::middleware('auth:sanctum')->prefix('admin')->group(function(){
    Route::resource('role_permission',App\Http\Controllers\Api\Admin\RolesAndPermissionController::class);
});

