@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header bg-primary">
    <h4>Products
      {{-- @can('create-product') --}}
          
      <a href="{{url('add-product')}}" class="btn btn-success float-right"  data-bs-toggle="modal" data-bs-target="#productModal"><i class="fa fa-plus"></i>Add Product</a>
      {{-- @endcan --}}
    </h4>
  </div>
</div>

{{-- <div class="card"> --}}
  <table class="table table-responsive table-hover w-auto">
     <thead>
       <tr>
         <th>ID</th>
         <th>Category</th>
         <th>Name</th>
         <th>Selling Price</th>
         <th>Shop Name</th>
         <th>Image</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
       @foreach ($products as $product)
       <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->name}}</td>
        <td>Tsh{{$product->selling_price}}/=</td>
        <td>{{$product->shop->name}}</td>
        <td>
          <img src="{{asset('admin/images/product/'.$product->image)}}" class="cate-image" alt="Image here">
        </td>
        <td>
          <div class="">
          {{-- @can('edit-product') --}}
         <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$product->id}}"> <i class="fa fa-pencil" title="Edit"></i></a>
          {{-- @endcan --}}

          <a href="#" data-bs-toggle="modal" data-bs-target="#ModalDelete{{$product->id}}"> <i class="fa fa-trash" title="Delete"></i></a>
          @include('admin.product.delete')
          @include('admin.product.edit')
        </div>
        </td>
         </tr>   
       @endforeach  
     </tbody>
   </table>
  {{-- </div>       --}}

  <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-12 mb-3">
                  <select class="form-select" name="shop_id" >
                      <option value="">--Select Shop--</option>
                      @foreach ($shops as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                       </select>
              </div>
              <div class="col-md-12 mb-3">
                <select class="form-select" name="user_id" >
                    <option value="">--Select Shop Owner--</option>
                    @foreach ($users as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                     </select>
            </div>
          <div class="row">
              <div class="col-md-12 mb-3">
                  <select class="form-select" name="cate_id" >
                      <option value="">--Select Category--</option>
                      @foreach ($category as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                     
                    </select>
              </div>
            <div class="col-md-6 mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name">
            </div>
      
            <div class="col-md-6 mb-3">
              <label for="slug">Slug</label>
              <input type="text" class="form-control" name="slug">
            </div>
      
            <div class="col-md-12 mb-3">
              <label for="small_desc">Small Description</label>
              <textarea name="small_desc" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-12 mb-3">
              <label for="desc">Description</label>
              <textarea name="desc" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-6 ">
              <label for="">Original Price</label>
              <input type="number" class="form-control" name="origin_price">
            </div>
            <div class="col-md-6 ">
              <label for="">Selling Price</label>
              <input type="number" class="form-control" name="selling_price">
            </div>
            <div class="col-md-6 ">
              <label for="">Quantity</label>
              <input type="number" class="form-control" name="quantity">
            </div>
            <div class="col-md-6 ">
              <label for="">Tax</label>
              <input type="number" class="form-control" name="tax">
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Status</label>
              <input type="checkbox" name="status">
            </div>
      
            <div class="col-md-6 mb-3">
              <label for="">Trending</label>
              <input type="checkbox" name="trending">
            </div>
      
            <div class="col-md-12 mb-3">
              <label for="meta_title">Meta Title</label>
              <input type="text" class="form-control" name="meta_title">
            </div>
      
            <div class="col-md-12 mb-3">
              <label for="meta_desc">Meta Description</label>
              <input type="text" class="form-control" name="meta_desc">
            </div>
      
            <div class="col-md-12 mb-3">
              <label for="meta_key">Meta Keywords</label>
              <input type="text" class="form-control" name="meta_key">
            </div>
      
            <div class="col-md-12">
              <input type="file" class="form-control" name="image">
            </div>
      
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
      </div>
    </div>
  </div>
@endsection
