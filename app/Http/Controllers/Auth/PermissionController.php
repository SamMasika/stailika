<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        // if(Auth::check())
        // {
            $permissions=Permission::all();
            return view('auth.permissions.index',compact('permissions'));
        // }
    }

    public function create()
    {
        
        return view('auth.permissions.create');

    }

    public function store(request $request)
    {
            $permission = Permission::create(['name' => $request->name,'description'=>$request->description]);
            return redirect('/permissions-list');
    }

    
    public function edit($id)
    {
        $permissions=Permission::find($id);
    return view('auth.permissions.edit',compact('permissions'));
    }




    public function update(Request $request, $id)
    {
        
        $permission = Permission::find($id);
        $permission->update(['name' => $request->name,'description'=>$request->description]);
 
        return redirect('/permissions-list');
    }

    public function destroy($id)
{
    $permission=Permission::find($id);
   $permission->delete();
return redirect('/permissions-list')
->with('success','permission deleted successfully');
}

    
}
