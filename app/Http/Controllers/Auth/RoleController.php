<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
    
            $roles=Role::all();
            return view('auth.roles.index',compact('roles'));
    }

    public function rolePermissions($id)
    {
    
        $roles=Role::find($id);
        $permissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                  ->join('roles', 'roles.id', '=', 'role_has_permissions.role_id')
                  ->where('role_has_permissions.role_id',$id)
                  ->get(['permissions.name','permissions.description','permissions.id']);
                  return view('auth.roles.perm',compact('roles','permissions'));
    }

    public function create()
    {
        
        return view('auth.roles.create');

    }

    public function store(request $request)
    {
            $role = Role::create(['name' => $request->name]);
            return redirect('/roles-list');
    }
    public function edit($id)
    {
        $roles=Role::find($id);
    return view('auth.roles.edit',compact('roles'));
    }




    public function update(Request $request, $id)
    {
        
        $role = Role::find($id);
        $role->update(['name' => $request->name,]);
 
        return redirect('/roles-list');
    }

    public function destroy($id)
{
    $role=Role::find($id);
   $role->delete();
return redirect('/roles-list')
->with('success','Role deleted successfully');
}

public function removePermission($id)
{
    $role=Role::find($id);
    $permission=Permission::find($id);
    
        $role->revokePermissionTo($permission);
        return back()->with('error', 'Permission revoked.');
    
    // return back()->with('message', 'Permission not exists.');
}
}
 