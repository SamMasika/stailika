{{-- @extends('layouts.front')

@section('content')

@foreach($permissions as $permission)
    <h3>{{ Str::camel($permission['name']) }}</h3>
        
    <table>
        <thead>
        <tr>
            <th>Permisson</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            
            @foreach (\Spatie\Permission\Models\Permission::where('name', $permission['name'])->get() as $perm)
                <tr>
                    <td>{{ $perm->name }}</td>
                    <td><input type="checkbox" name="permission[]" value="{{ $perm->id }}" ` /></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach
@endsection --}}


@extends('layouts.admin')

@section('content')
<div class="card">

    <div class="card-header bg-primary">
      <h4> Permissions
        {{-- @can('create-permission') --}}
        <a href="{{url('create-permission')}}" class="btn btn-success float-right " data-bs-toggle="modal" data-bs-target="#roleModal">Create Permission</a>  
         {{-- @endcan --}}
        
      </h4>
    </div>
</div>
{{-- <div class="card"> --}}
  
  {{-- <div class="card-body"> --}}
      {{-- <h3>{{ Str::camel($permission['name']) }}</h3> --}}
      <table class="table table-responsive table-hover w-auto">
          <thead>
              <tr>

                  <th width="5%"></th>
                  <th width="35%">Permission</th>
                  <th width="50%">Description</th>
                  <th>Action</th>
                  
                </tr>
            </thead>
            @foreach($permissions as $permission)

     <tbody>
        @foreach (\Spatie\Permission\Models\Permission::where('name', $permission['name'])->get() as $perm)
        <tr>
            <td> </td>
            <td>{{ $perm->name }}</td>
            <td>{{ $perm->description }}</td>
            <td>
                <div class=" btn-group ">
                {{-- <a href="" class="btn btn-info btn-sm ">View</a> --}}
                <a href="{{url('edit-permission/'.$perm->id)}}" class=" "><i class="fa fa-pencil" title="Edit"></i></a>
                <a href="{{url('delete-permission/'.$perm->id)}}" class=""><i class="fa fa-trash" title="Delete"></i></a>
            </div>
            
            </td>

        </tr>
    @endforeach
      
</tbody>
@endforeach
   </table>
  {{-- </div> --}}
{{-- </div>    --}}


<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Permission</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{url('store-permission')}}" method="post">
            @csrf
            <div>
        <label for="">Name</label>
        <input type="text" class="form-control" name="name">
        </div>
        <div>
        <label for="">Description</label>
        <input type="text" class="form-control" name="description">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create</button>
       </div>
    </form>
      </div>
    </div>
  </div>
  
@endsection
