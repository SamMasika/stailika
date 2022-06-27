@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Registered Users</h4>
  </div>
</div>
  {{-- <div class="card-body"> --}}
   <table class="table table-hover table-responsive  w-auto">
     <thead>
       <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
       @foreach ($users as $user)
       <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>    
        <td>
          <div class="">
          <a href="{{url('view-user/'.$user->id)}}" ><i class="fa fa-eye" title="View"></i></a>
          {{-- <a href="{{url('rolepermission/'.$user->id)}}"><i class="fa fa-eye" title="View"></i></a> --}}
          <a href="{{url('users/'.$user->id)}}" ><i class="fa fa-trash" title="Delete"></i></a>
          <a href="{{url('userPerm/'.$user->id)}}" class="btn btn-primary btn-sm" >AssignRole</a>
        </div>
        </td>
         </tr>   
       @endforeach      
     </tbody>
   </table>
  {{-- </div> --}}
{{-- </div> --}}
@endsection
