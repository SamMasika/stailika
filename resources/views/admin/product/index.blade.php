@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header bg-primary">
    <h4>Products
      {{-- @can('create-product') --}}
          
      <a href="{{url('add-product')}}" class="btn btn-success float-right"><i class="fa fa-plus"></i>Add Product</a>
      {{-- @endcan --}}
    </h4>
  </div>
</div>

<div class="card">
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
         <a href="{{url('edit-prod/'.$product->id)}}" class=""> <i class="fa fa-pencil" title="Edit"></i></a>
          {{-- @endcan --}}
          <a href="{{url('delete-prod/'.$product->id)}}" class=""> <i class="fa fa-trash" title="Delete"></i></a>
        </div>
        </td>
         </tr>   
       @endforeach  
     </tbody>
   </table>
  </div>      
@endsection
