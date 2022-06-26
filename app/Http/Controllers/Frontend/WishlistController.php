<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist=Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist.wishlist',compact('wishlist'));
    }

    public function addtowishlist(request $request)
    {
        if(Auth::check())
        {
            
            $prod_id=$request->product_id;
            if(Product::find( $prod_id))
            {
               $wish=new Wishlist();
               $wish->prod_id=$prod_id;
               $wish->user_id=Auth::id();
               $wish->save();
               return response()->json(['status'=>"Product Added to Wishlist"]);
             }else{
                return response()->json(['status'=>"Product does not exist"]);
             }
            
           
        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);   
        }
    }

    public function delete(Request $request)
    {
        if(Auth::check())
        {
            $prod_id=$request->prod_id;
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $wish=Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $wish->delete();
                return response()->json(['status'=> "Item Removed from Wishlist"]);
            }
        }
    else
    {
        return response()->json(['status'=>"Login to Continue"]);
    }
     }

     public function wishlistcount()
     {
         $wishlistcount=Wishlist::where('user_id',Auth::id())->count();
         return response()->json(['count'=>$wishlistcount]);
     }

}
