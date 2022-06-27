{{-- @extends('layouts.front')

@section('content')

@foreach($rolissions as $rolission)
    <h3>{{ Str::camel($rolission['name']) }}</h3>
        
    <table>
        <thead>
        <tr>
            <th>Permisson</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            
            @foreach (\Spatie\Permission\Models\Permission::where('name', $rolission['name'])->get() as $rol)
                <tr>
                    <td>{{ $rol->name }}</td>
                    <td><input type="checkbox" name="permission[]" value="{{ $rol->id }}" ` /></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach
@endsection --}}


@extends('layouts.admin')

@section('content')
<div class="card">

    <div class="card-header">
      <h4>Roles
          <a href="{{url('create-role')}}" class="btn btn-primary  float-right "  data-bs-toggle="modal" data-bs-target="#roleModal">Create Role</a>        
      </h4>
    </div>
</div>
{{-- <div class="card"> --}}
  
  {{-- <div class="card-body"> --}}
      {{-- <h3>{{ Str::camel($rolission['name']) }}</h3> --}}
      <table class="table  table-hover table-responsive w-auto">
          <thead>
              <tr>

                  <th width="5%"></th>
                  <th width="70%">Role</th>
                  <th>Action</th>
                </tr>
            </thead>
            @foreach($roles as $role)

     <tbody>
        @foreach (\Spatie\Permission\Models\Role::where('name', $role['name'])->get() as $rol)
        <tr>
            <td> </td>
            <td>{{ $rol->name }}</td>
            <td>
                <div class=" btn-group ">
                <a href="" class=""><i class="fa fa-eye" title="View"></i></a>
                <a href="{{url('edit-role/'.$rol->id)}}" ><i class="fa fa-pencil" title="Edit"></i></a>
                <a href="{{url('delete-role/'.$rol->id)}}" ><i class="fa fa-trash" title="Delete"></i></a>
                <a href="{{url('createassign/'.$rol->id)}}" class="btn btn-primary btn-sm">AssignPermissions</a>
            </div>
            
            </td>

        </tr>
    @endforeach
</tbody>
@endforeach
   </table>
  {{-- </div> --}}
{{-- </div>    --}}


<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{url('store-role')}}" method="post">
            @csrf
            <div>
        <label for="">Name</label>
        <input type="text" class="form-control" name="name">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Create</button>
       </div>
    </form>
      </div>
    </div>
  </div>
  
@endsection


