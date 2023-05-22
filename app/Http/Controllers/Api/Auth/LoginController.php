<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Notifications\LoginNotification;
use Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];


        if(auth()->attempt($credentials)){
            $user = Auth::User();
            
            $user->tokens()->delete();
            $success['token'] = $user->createToken(request()->userAgent())->plainTextToken;
            $success['name'] = $user->first_name;
            $success['success'] = 'login successfully';

            try{
                $user->notify(new LoginNotification());
            }catch(\Exception $e){}
            
            return response()->json($success, 200);

        }else{
            return response()->json(['error' => 'incorrect email or password'], 401);
        }
    }
}
