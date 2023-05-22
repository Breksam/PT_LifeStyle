<?php

namespace App\Http\Controllers\Api\Admin;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\AuthorizeCheck;
use App\Traits\ImageProcessing;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Http\Requests\Admin\User\UserIndexRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;

class UserCrudController extends Controller
{
    use AuthorizeCheck;
    use ImageProcessing;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserIndexRequest $request){
        
        $users = User::all();

        if(!empty($request->role)){
                $users = $users->where('role', $request->role);
        }

        $success['success'] = "View All Users";
        $success['users']   = $users;
        return response()->json($success, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorizeCheck('users create');
        $users = User::all();
        $success['success'] = 'User Created Successfully';
        $success['users']   = $users;
        return response()->json($success, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request){
        $data =  $request->validated();
        $data['password'] = Hash::make($data['password']);

        if($request->hasfile('image')){
            $data['image'] = $this->saveImage($request->file('image'));
        }

            $success['success'] = 'User Added Successfully';
            $success['data'] = User::create($data);
            return response()->json($success, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $this->authorizeCheck('users edit');
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(["error" => 'User not found'], 200);
        }
        $success['success'] = "Edit User";
       $success['user']   = $user;
       return response()->json($success, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserUpdateRequest $request)
    {
        $user = User::find($id);
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        if($request->hasfile('image')){
            $data['image'] = $this->saveImage($request->file('image'));
        }

        $user->update($data);
        $user->refresh();

        $user->image? $user->image = $user->image_url:'';
        $user->image_url;

        $success['success'] = "User data is updated successfully";
        $success['user'] = $user;
        return response()->json($success, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, User $user)
    {
        $this->authorizeCheck('users delete');
        $user = User::find($id);
        $user->delete();
        $success['success'] = "User Deleted successfully";
        return response()->json($success, 200);
    }
}
