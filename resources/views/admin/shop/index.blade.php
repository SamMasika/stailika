@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header bg-primary">
    <h4>Shop
        <a href="{{url('create-shop')}}" class="btn btn-success float-right"  data-bs-toggle="modal" data-bs-target="#shopModal"><i class="fa fa-plus"></i>Create Shop</a>
    </h4>
  </div>
</div>
  {{-- <div class="card-body"> --}}
    {{-- <div class="card"> --}}
   <table class="table  table-hover table-responsive w-auto">
     <thead>
       <tr>
         <th>Name</th>
         <th>Description</th>
         <th>Owner Name</th>
         <th>Status</th>
         <th>Action</th>
        
       </tr>
     </thead>
     <tbody>
       @foreach ($shops as $shop)
       <tr>
        <td>{{$shop->name}}</td>
        <td>{{$shop->description}}</td>
        <td>{{$shop->user->name}}</td>
        <td>{{$shop->is_active=='0'?'Inactive':'Active'}}
        
        </td>
        <td>
          @can('edit-shop')
               <a href="{{url('edit-shop/'.$shop->id)}}" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$shop->id}}"> <i class="fa fa-pencil" title="Edit"></i></a>
          @endcan
          @can('delete-shop')
           <a href="#" data-bs-toggle="modal" data-bs-target="#ModalDelete{{$shop->id}}"> <i class="fa fa-trash" title="Delete"></i></a>
           @endcan
         
          {{-- @include('admin.shop.edit') --}}
             @can('activate-shop')
             @if($shop->is_active==0)
             <a href="{{url('activate/'.$shop->id)}}" class=""> <i class="fa fa-unlock" title="Activate"></i></a>
             @else
             <a href="{{url('activate/'.$shop->id)}}" class=""><i class="fa fa-lock" title="Deactivate"></i></a>
             @endif
                 @endcan
        </td>
        @include('admin.shop.delete')
        @include('admin.shop.editshop')
         </tr>   
       @endforeach  
     </tbody>
   </table>
  {{-- </div> --}}

 

  <div class="modal fade" id="shopModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Shop</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
          <form action="{{url('store-shop')}}" method="post" enctype="multipart/form-data">
            @csrf
      
            <div class="row">
              <div class="col-md-12 mb-3">
                  <select class="form-select" name="user_id" >
                      <option value="">--Select Owner--</option>
                      @foreach ($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                     
                    </select>
              </div>
      
            <div class="col-md-6 mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name">
            </div>
      
            <div class="col-md-12 mb-3">
              <label for="desc">Description</label>
              <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-6 ">
              <label for="">Rating</label>
              <input type="number" class="form-control" name="rating">
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Status</label>
              <input type="checkbox" name="status">
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
        </div>
      </div>
  
            
@endsection
