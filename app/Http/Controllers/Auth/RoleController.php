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
}
 