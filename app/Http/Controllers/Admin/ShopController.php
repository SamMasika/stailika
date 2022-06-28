<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    function __construct()
    {
     $this->middleware('permission:view-shops|create-shop|edit-shop|list-product', ['only' => ['index','users']]);
        $this->middleware('permission:create-product', ['only' => ['create','store']]);
      $this->middleware('permission:edit-product', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-product', ['only' => ['destroy']]);
}

    public function index()
    {
        $user_id = Auth::user()->id;
        if(Auth::user()->hasRole('admin')){
            $shops=Shop::all();
        }else{
            $shops=Shop::where('user_id','=',$user_id)
            ->get();
            
        }
        $users=User::all();
        return view('admin.shop.index',compact('shops','users'));
    }

    public function create()
    {
        $users=User::all();
        return view('admin.shop.create',compact('users'));
    }
    public function store(Request $request)
    {
        $shops=new Shop;
        $shops->name=$request->name;
        $shops->description=$request->description;
        $shops->rating=$request->rating;
        $shops->user_id=$request->user_id;
        $shops->is_active=$request->input('is_active')==true?'1':'0';
        $shops->save();
        return redirect()->back()->with('success','Shop Created Successfully!');
       
    }

    public function edit($id)
    {
        $shop=Shop::find($id);
        return view('admin.shop.edit',compact('shop'));
    }

    public function update(Request $request,$id)
    {
        $shops=Shop::find($id);
        $shops->name=$request->name;
        $shops->description=$request->description;
        $shops->rating=$request->rating;
        $shops->is_active=$request->input('is_active')==true?'1':'0';
        $shops->save();
        return redirect()->back()->with('success','Shop Edited Successfully!');
    }

    public function destroy($id)
    {
         $shops=Shop::find($id);
         $shops->delete();
         return redirect()->back()->with('error','Shop Deleted Successfully!');
    }

    public function activate($id)
    {
        $shop=Shop::find($id);
        if($shop->is_active==0)
        {
            $shop->is_active=1;
            $shop->save();
            return redirect()->back()->with('success','Shop is Activated');  
        }elseif($shop->is_active==1)
        {
            $shop->is_active=0;
            $shop->save();
            return redirect()->back()->with('success','Shop is inactive');
        }
    }
}
