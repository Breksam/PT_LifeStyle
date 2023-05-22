<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Notifications\ResetPasswordVerificationNotification; 
use App\Models\User;


class ForgetPasswordController extends Controller
{
    public function forgetPassword(ForgetPasswordRequest $request){
        $input = $request->only('email');
        $user = User::where('email', $input)->first();
        $user->notify(new ResetPasswordVerificationNotification());
        $success['success'] = "Please, check your email";
        return response()->json($success, 200);
    }
}
