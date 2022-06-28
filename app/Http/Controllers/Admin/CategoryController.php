<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    function __construct()

    {

        //  $this->middleware('permission:category-list|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        //   $this->middleware('permission:create-category', ['only' => ['create','store']]);
        //      $this->middleware('permission:edit-category', ['only' => ['edit','update']]);
        //       $this->middleware('permission:delete-category', ['only' => ['destroy']]);

    }
    public function index()
    {
        $categories=Category::all();
        $shops=Shop::all();
        return view('admin.category.index',compact('categories','shops'));
    }

    public function create()
    {
        $shops=Shop::all();
        return view('admin.category.addcategory',compact('shops'));
    }

    public function store(request $request)
    {
        $category=new Category;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('admin/images/category/',$filename);
            $category->image=$filename;
        }
        $category->name=$request->name;
        $category->shop_id=$request->shop_id;
        $category->slug=$request->slug;
        $category->description=$request->description;
        $category->status=$request->input('status')==true?'1':'0';
        $category->popular=$request->input('popular')==true?'1':'0';
        $category->meta_title=$request->meta_title;
        $category->meta_description=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;
        $category->save();
        return redirect('/categories')->with("status","Category Added Successfully!");

    }

    public function edit($id)
    {
        $category=Category::find($id);
        $shops=Shop::find($id);
        return view('admin.category.editcat',compact('category','shops'));
    }
    
    public function update(request $request,$id)
    {
        $category=Category::find($id);
        if($request->hasFile('image'))
        {
            $path='admin/images/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('admin/images/category/',$filename);
            $category->image=$filename;
        }
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=$request->description;
        $category->status=$request->input('status')==true?'1':'0';
        $category->popular=$request->input('popular')==true?'1':'0';
        $category->meta_title=$request->meta_title;
        $category->meta_description=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;
        $category->update();
        return redirect('/categories')->with("status","Category Updated Successfully!");
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        if($category->image)
        {
            $path='admin/images/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        $category->delete();
        return redirect('/categories')->with("status","Category Deleted Successfully!");
        }
    }
}
