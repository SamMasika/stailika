<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller

    {
        function __construct()

    {

        $this->middleware('permission:create-product|delete-product|edit-product|list-product', ['only' => ['index','show']]);
         $this->middleware('permission:create-product', ['only' => ['create','store']]);
       $this->middleware('permission:edit-product', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-product', ['only' => ['destroy']]);

    }
        
        public function index()
        {
            $user_id = Auth::user()->id;
            if(Auth::user()->hasRole('admin')){
                $products=Product::all();
            }else{
                $products=Product::where('user_id','=',$user_id)
                ->get();
                
            }
            // var_dump($products);
            return view('admin.product.index',compact('products'));
        }
    
       
        public function create()
        {
            $category=Category::all();
            $shops=Shop::all();
            $users=User::all();
            return view('admin.product.addproduct',compact('category','shops','users'));
        }
    
        public function store(request $request)
        {
            $product=new Product;
            if($request->hasFile('image'))
            {
                $file=$request->file('image');
                $ext=$file->getClientOriginalExtension();
                $filename=time().'.'.$ext;
                $file->move('admin/images/product/',$filename);
                $product->image=$filename;
            }
            $product->name=$request->name;
            $product->cate_id=$request->cate_id;
            $product->shop_id=$request->shop_id;
            $product->user_id=$request->user_id;
            $product->slug=$request->slug;
            $product->desc=$request->desc;
            $product->small_desc=$request->small_desc;
            $product->origin_price=$request->origin_price;
            $product->selling_price=$request->selling_price;
            $product->quantity=$request->quantity;
            $product->tax=$request->tax;
            $product->status=$request->input('status')==true?'1':'0';
            $product->trending=$request->input('trending')==true?'1':'0';
            $product->meta_title=$request->meta_title;
            $product->meta_desc=$request->meta_desc;
            $product->meta_key=$request->meta_key;
            $product->save();
            return redirect('/products')->with("status","Product Added Successfully!");
    
        }
       
        public function edit($id)
        {
            $product=Product::find($id);
            return view('admin.product.editprod',compact('product'));
        }

        public function update(request $request,$id)
        {
            $product=Product::find($id);
            if($request->hasFile('image'))
            {
                $path='admin/images/product/'.$product->image;
                if(File::exists($path))
                {
                    File::delete($path);
                }
                $file=$request->file('image');
                $ext=$file->getClientOriginalExtension();
                $filename=time().'.'.$ext;
                $file->move('admin/images/product/',$filename);
                $product->image=$filename;
            }
            $product->name=$request->name;
            $product->slug=$request->slug;
            $product->desc=$request->desc;
            $product->small_desc=$request->small_desc;
            $product->origin_price=$request->origin_price;
            $product->selling_price=$request->selling_price;
            $product->quantity=$request->quantity;
            $product->tax=$request->tax;
            $product->status=$request->input('status')==true?'1':'0';
            $product->trending=$request->input('trending')==true?'1':'0';
            $product->meta_title=$request->meta_title;
            $product->meta_desc=$request->meta_desc;
            $product->meta_key=$request->meta_key;
            $product->update();
            return redirect('/products')->with("status","Product Updated Successfully!");
    

        }

        public function destroy($id)
        {
            $product=Product::find($id);
            if($product->image)
            {
                $path='admin/images/product/'.$product->image;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            $product->delete();
            return redirect('/products')->with("status","Product Deleted Successfully!");
            }
        }
    
    
}
