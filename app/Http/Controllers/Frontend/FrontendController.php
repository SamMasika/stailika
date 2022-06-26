<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Shop;

class FrontendController extends Controller
{
    public function index()
    {
        $fproducts=Shop::
        join('products', function ($join) {
            $join->on('shops.id', '=', 'products.shop_id')
                 ->select('products.shop_id','shops.name')
                   ->where('is_active',1)
                    ->where('trending',1);
        })
        ->get();
        // $fproducts=Product::crossJoin('shops')
        // ->where('shop_id',$shop_id )
        // ->where('is_active',1)
        // ->where('trending',1)
        // ->get();
    //  return   $shop_id;    
         $tcategory=Category::where('popular','1')->take(10)->get();
          return view('frontend.index',compact('fproducts','tcategory'));
    }

    public function category()
    {
        $category=Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
           $category=Category::where('slug',$slug)->first();
           $product=Product::where('cate_id',$category->id)->where('status','0')->get();
           return view('frontend.product.index',compact('category','product'));
        }
        else
        {
            return redirect('/')->with('status','Slug does not exist');
        }
        
    }

    public function productview($cate_slug,$prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $product=Product::where('slug',$prod_slug)->first();
                return view('frontend.product.view',compact('product'));
            }
            else{
                return redirect('/')->with('status','the link was broken');
            }
        }
        else{
            return redirect('/')->with('status','No such Category found');
        }
    }
    
}
