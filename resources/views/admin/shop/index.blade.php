@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header bg-primary">
    <h4>Shop
        <a href="{{url('create-shop')}}" class="btn btn-success float-right"><i class="fa fa-plus"></i>Create Shop</a>
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
               <a href="{{url('edit-shop/'.$shop->id)}}" class=""> <i class="fa fa-pencil" title="Edit"></i></a>
          @endcan
          @can('delete-shop')
           <a href="{{url('delete-shop/'.$shop->id)}}" class=""> <i class="fa fa-trash" title="Delete"></i></a>
           @endcan
          
             @can('activate-shop')
             @if($shop->is_active==0)
             <a href="{{url('activate/'.$shop->id)}}" class=""> <i class="fa fa-unlock" title="Activate"></i></a>
             @else
             <a href="{{url('activate/'.$shop->id)}}" class=""><i class="fa fa-lock" title="Deactivate"></i></a>
             @endif
                 @endcan
        </td>
         </tr>   
       @endforeach  
     </tbody>
   </table>
  {{-- </div> --}}
@endsection
