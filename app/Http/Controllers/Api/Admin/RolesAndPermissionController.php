<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Traits\AuthorizeCheck;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\Roles\RolesStoreRequest;
use App\Http\Requests\Admin\Roles\RolesUpdateRequest;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionController extends Controller
{
    use AuthorizeCheck;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorizeCheck('settings view');
        $role = Role::all();
        return response()->json(['success'=> "All Roles views Successfully", 'data'=>$role], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        $this->authorizeCheck('settings edit');
        $permissions =Permission::all();
        return response()->json(['success'=>"Permission Created Successfully", 'permissions'=>$permissions], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesStoreRequest $request){

        $data = $request->validated();
        $role = Role::create(['name'=>$request->role, 'guard_name' => 'web'])->givePermissionTo($request->permissions);
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        return response()->json(['success'=>"Role Added Successfully", 'data'=>$role], 200);
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

        $this->authorizeCheck('settings edit');
        $role = Role::find($id);
        $role->permissions;
        $permissions = Permission::all();
        return response()->json(['success'=> true, 'data'=>$role,'all_permissions'=>$permissions], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesUpdateRequest $request, $id)
    {
        $role = Role::find($id);
        $permissions = $role->permissions;
        $role->revokePermissionTo($permissions);
        $role->givePermissionTo($request->permissions);
        $role->update(['name'=>$request->role]);
        $role = $role->refresh();
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        return response()->json(['success'=>"The Role and his permissions updated successfully", 'data'=>$role], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $this->authorizeCheck('settings delete');
        $role = Role::find($id);
        $permissions = $role->permissions;
        $role->revokePermissionTo($permissions);
        $role->delete();

        return response()->json(['success'=>'Role Deleted Successfully'], 200);
    }
}
