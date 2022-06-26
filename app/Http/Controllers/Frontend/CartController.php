<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(request $request)
    {
        $product_id=$request->product_id;
        $product_qty=$request->product_qty;

        if(Auth::check())
        {
            $prod_check=Product::where('id', $product_id)->first();
            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>$prod_check->name."Already Added to Cart"]);
                }else
                {
                    $cartitem=new Cart();
                    $cartitem->prod_id=$product_id;
                    $cartitem->user_id=Auth::id();
                    $cartitem->prod_qty=$product_qty;
                    $cartitem->save();
                    return response()->json(['status'=>$prod_check->name."Added to Cart"]);
                }
              
            }
        }else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }
    }

    public function viewcart()
    {
        $cartitems=Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart.cart',compact('cartitems'));
    }

    public function deletecartitem(request $request)
    {
        if(Auth::check())
        {
            $prod_id=$request->prod_id;
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists());
            {
                $cartitem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status'=> "Product is Removed Successfully!"]);
            }
        }
    else
    {
        return response()->json(['status'=>"Login to Continue"]);
    }
    }

    public function updatecart(request $request)
    {
        $prod_id=$request->prod_id;
        $product_qty=$request->prod_qty;

        if(Auth::check())
        {
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartitem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->prod_qty=$product_qty;
                $cartitem->update();
                return response()->json(['status'=> "Quantity Updated Successfully!"]);
            }
        }else
        {
            return response()->json(['status'=>"Login to Continue"]);       
        }
    }

    public function cartcount()
    {
        $cartcount=Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }
}
