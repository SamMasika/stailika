<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionRoleController extends Controller
{
    public function index($id)
    {
        // $users=User::find($id);
        // $permissions = $users->getPermissionsViaRoles();
        // $roles = $users->getRoleNames();
        // return  $roles;
    //     $roles=Role::find($id);
    //     $rolePermissions= Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id",)
    //     ->where("role_has_permissions.role_id",$id)
    //     ->get();
    // return view('auth.users.details',compact('roles','rolePermissions'));
    //    return $role->permissions;

    $users=User::find($id);
    $roles = Role::join('model_has_roles','model_has_roles.role_id' , '=', 'roles.id')
              ->where('model_has_roles.role_id',$id)
              ->get(['roles.name',]);
              return  $roles ;
              return view('auth.roles.role',compact('users','roles'));
    }

    public function assignPerm(Request $request,$id)
{
    // var_dump($request['permission']);
    $role=Role::find($id);
   $assgnRole = $role->givePermissionTo($request->input('permission'));
    return redirect()->back()->with('success','Permission assigned successfully!');
}

public function createRolePerm($id)
{
    $permissions=Permission::all();
    $roles=Role::find($id);
    return view('auth.pero.create',compact('permissions','roles'));
}

public function show($id)
{
    $user = User::find($id);
    $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        ->where("role_has_permissions.role_id",$id)
        ->get();

    return view('auth.pero.show',compact('role','rolePermissions'));
}

}
