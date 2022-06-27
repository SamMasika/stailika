@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header bg-primary">
    <h4>Categories
      <a href="{{url('add-category')}}" class="btn btn-success float-right"> <i class="fa fa-plus"></i>Add Category</a>
    </h4>
  </div>
</div>

  {{-- <div class="card"> --}}
   <table class="table table-responsive table-hover ">
     <thead>
       <tr>
         <th width="5%">ID</th>
         <th width="15%">Name</th>
         <th width="35%">Description</th>
         <th width="30%">Image</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
       @foreach ($categories as $category)
       <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->description}}</td>
        <td>
          <img src="{{asset('admin/images/category/'.$category->image)}}" class="cate-image" alt="Image here">
        </td>
        <td>
          <div class="">
          <a href="{{url('edit-cat/'.$category->id)}}" class=""> <i class="fa fa-pencil" title="Edit"></i></a>
          <a href="{{url('delete-cat/'.$category->id)}}" class=""> <i class="fa fa-trash" title="Delete"></i></a>
        </div>
        </td>
         </tr>   
       @endforeach
      
      
     </tbody>
   </table>
  {{-- </div> --}}
{{-- </div> --}}
          
         
           
@endsection
