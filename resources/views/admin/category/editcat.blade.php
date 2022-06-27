@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Edit/Update Category</h4>
  </div>
  <div class="card-body">
    @if (Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success:</strong>{{Session::get('status')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
        @endif
    <form action="{{url('update-cat/'.$category->id)}}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}">
      </div>

      <div class="col-md-6 mb-3">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
      </div>

      <div class="col-md-12 mb-3">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" rows="3"> {{$category->description}}</textarea>
      </div>

      <div class="col-md-6 mb-3">
        <label for="">Status</label>
        <input type="checkbox" name="status" {{$category->status==true?'checked':''}}>
      </div>

      <div class="col-md-6 mb-3">
        <label for="">Popular</label>
        <input type="checkbox" name="popular" {{$category->popular=="1"?'checked':''}}>
      </div>

      <div class="col-md-12 mb-3">
        <label for="meta_title">Meta Title</label>
        <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
      </div>

      <div class="col-md-12 mb-3">
        <label for="meta_description">Meta Description</label>
        <input type="text" class="form-control" name="meta_description" value="{{$category->meta_description}}">
      </div>

      <div class="col-md-12 mb-3">
        <label for="meta_keywords">Meta Keywords</label>
        <input type="text" class="form-control" name="meta_keywords" value="{{$category->meta_keywords}}" >
      </div>

      @if ($category->image)
         <img src=" {{asset('admin/images/category/'.$category->image)}}" alt="Category Image"> 
         @endif
         <div class="col-md-12">
            <input type="file" class="form-control"  name="image">
          </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>
  </div>
</div>
          
         
           
@endsection
