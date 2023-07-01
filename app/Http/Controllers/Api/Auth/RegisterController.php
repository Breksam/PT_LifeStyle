<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sanctum\PersonalAccessToken;
use Hash;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Notifications\EmailVerficationNotification;

class RegisterController extends Controller
{
    public function register(RegistrationRequest $request){
        
        $newuser = $request->validated();

        $newuser['password'] = Hash::make($newuser['password']);
        $newuser['role'] = 'user';

        $user = User::create($newuser);

        $success['token'] = $user->createToken('user', ['app:all'])->plainTextToken;
        $success['name'] = $user->first_name;
        $success['success'] = "Registered successfully";
        $user->notify(new EmailVerficationNotification());
        return response()->json($success, 200);
    }
}

