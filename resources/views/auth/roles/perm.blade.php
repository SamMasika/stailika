@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header bg-primary">
    <h4>
        Role-Permissions
        <a href="{{url('roles-list')}}" class="btn btn-success float-right" ><i class="fa fa-left-arrow"></i>Back</a>
    </h4>
  </div>
</div>
    <div class="table-responsive">
   <table class="table  table-hover table-bordered" id="role-perm">
     <thead>
       <tr>
       
         <th>Name</th>
        
         {{-- <th>Action</th> --}}
       </tr>
     </thead>
     <tbody>
       @foreach ($permissions as $perm)
       <tr>
       
        <td>{{$perm->name}}</td>
        
        {{-- <td>
            <a href="{{url('remove-permission/'.$perm->id)}}" ><i class="fa fa-trash" title="Remove"></i></a>
        </td> --}}
         </tr>   
         @endforeach
     </tbody>
   </table>
  </div>
@endsection
