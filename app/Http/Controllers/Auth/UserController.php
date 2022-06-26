<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    // function __construct()

    // {

    //      $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
    //       $this->middleware('permission:user-create', ['only' => ['create','store']]);
    //          $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
    //           $this->middleware('permission:user-delete', ['only' => ['destroy']]);

    // }

    public function myorders()
    {
        $orders=Order::where('user_id',Auth::id())->get(); 
        return view('frontend.orders.index',compact('orders'));
    }

    public function vieworder($id)
    {
        $orders=Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.orders.view',compact('orders'));
    }


    public function index()
    {
        $users=User::all();
        // return Auth::user()->removeRole('admin');
       // return $user;
               return view('auth.users.index',compact('users'));
    }

    public function UserPermView($id)
    {
        $roles=Role::all();
        $permissions=Permission::all();
        $users=User::find($id);
        $userroles = $users->getRoleNames(); 
    return view('auth.users.role',compact('roles','users','permissions','userroles'));
    }

     public function assignRole(Request $request,$id)
    {
        $user=User::find($id);
       
        if ($user->hasRole($request->role))
        {
            return redirect('/user')->with('success', 'Role exists.');        
        }
        else{

            $user->assignRole($request->role);
            return back()->with('success', 'Role assigned.');
        }
    }


    
    public function givePermission(Request $request,$id)
    {
        $user=User::find($id);
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('success', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('success', 'Permission added.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    public function destroy($id)
    {
        $user=User::find($id);
        if ($user->hasRole('admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();
return back()->with('message', 'User deleted.');
    }
   


}
