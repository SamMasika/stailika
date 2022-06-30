<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function __construct()
     {
      $this->middleware('permission:view-dashboard|view-users|edit-product|list-product', ['only' => ['index','users']]);
         $this->middleware('permission:create-product', ['only' => ['create','store']]);
       $this->middleware('permission:edit-product', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-product', ['only' => ['destroy']]);
 }

    public function index()
    {
        return view('admin.dashboard');
    }
    public function users()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    public function viewuser($id)
    {
        $users=User::find($id);
        $users=User::find($id);
        $roles = Role::join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                  ->join('users', 'users.id', '=', 'model_has_roles.role_id')
                  ->where('model_has_roles.model_id',$id)
                  ->get(['roles.name',]);   
        return view('auth.users.details',compact('users','roles'));
    }

}
