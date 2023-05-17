<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ProfileUpdateRequest;
use App\Models\User;
use App\Traits\ImageProcessing;

class ProfileController extends Controller
{
    use ImageProcessing;

    public function update(ProfileUpdateRequest $request){
        $user = $request->user();
        $validatedData = $request->validated();

        if($request->hasfile('image')){
            $user->image? $this->deleteImage($user->image):'';
            $validatedData['image'] = $this->saveImage($request->file('image'));
        }

        $user->update($validatedData);
        $user = $user->refresh();
        
        $user->image? $user->image = $user->image_url:'';
        $user->image_url;
        
        $success['user'] = $user;
        $success['success'] = true;

        return response()->json($success, 200);
    }
}
