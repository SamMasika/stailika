<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    function __construct()
    {
     $this->middleware('permission:view-orders|update-orders|view-orderhistory|delete-orders', ['only' => ['index','users']]);
        $this->middleware('permission:create-product', ['only' => ['create','store']]);
      $this->middleware('permission:edit-product', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-product', ['only' => ['destroy']]);
}

    public function index()
    {
        $orders=Order::where('status','0')->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function view($id)
    {
        $orders=Order::where('id',$id)->first();
        return view('admin.orders.view',compact('orders'));
    }

    public function update(request $request,$id)
    {
        $orders=Order::find($id);
        $orders->status=$request->order_status;
        $orders->update();
        return redirect('/orders')->with('status',"Orders Updated Successfully!");
    }

    public function history()
    {
        $orders=Order::where('status','1')->get();
        return view('admin.orders.history',compact('orders'));
    }

    public function destroy($id)
    {
        $orders=Order::find($id);
        $orders->delete();
        return redirect()->back()->with('error','Order Removed Successfully!');
    }
}
