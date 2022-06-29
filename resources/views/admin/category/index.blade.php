@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header bg-primary">
    <h4>Categories
      <a href="{{url('add-category')}}" class="btn btn-success float-right"  data-bs-toggle="modal" data-bs-target="#categoryModal"> <i class="fa fa-plus"></i>Add Category</a>
    </h4>
  </div>
</div>

  <div class="table-responsive">
   <table class="table table-bordered table-hover " id="category">
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
          <a href="#"  data-bs-toggle="modal" data-bs-target="#ModalEdit{{$category->id}}"> <i class="fa fa-pencil" title="Edit"></i></a>
         
          <a href="#"  data-bs-toggle="modal" data-bs-target="#ModalDelete{{$category->id}}"> <i class="fa fa-trash" title="Delete"></i></a>
          @include('admin.category.delete')
          @include('admin.category.edit')
        </div>
        </td>
         </tr>   
       @endforeach
     </tbody>
   </table>
  {{-- </div> --}}
{{-- </div> --}}
          


<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <form action="{{url('insert-category')}}" method="post" enctype="multipart/form-data">
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
          <div class="col-md-6 mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name">
          </div>
    
          <div class="col-md-6 mb-3">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug">
          </div>
    
          <div class="col-md-12 mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
          </div>
    
          <div class="col-md-6 mb-3">
            <label for="">Status</label>
            <input type="checkbox" name="status">
          </div>
    
          <div class="col-md-6 mb-3">
            <label for="">Popular</label>
            <input type="checkbox" name="popular">
          </div>
    
          <div class="col-md-12 mb-3">
            <label for="meta_title">Meta Title</label>
            <input type="text" class="form-control" name="meta_title">
          </div>
    
          <div class="col-md-12 mb-3">
            <label for="meta_description">Meta Description</label>
            <input type="text" class="form-control" name="meta_description">
          </div>
    
          <div class="col-md-12 mb-3">
            <label for="meta_keywords">Meta Keywords</label>
            <input type="text" class="form-control" name="meta_keywords">
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

         
@endsection
