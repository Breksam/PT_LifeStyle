<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LogoutController extends Controller
{
    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return response()->json(['success' => 'Logged Out'], 200);
    }
}
