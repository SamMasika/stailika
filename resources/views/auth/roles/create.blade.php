@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Create Role
                    </div>
                    <div class="card-body">
                        <form action="{{url('store-role')}}" method="post">
                            @csrf
                        <label for="">Role Name</label>
                        <input type="text" class="form-control" name="name">
                        <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
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
        <label for="">Permission Name</label>
        <input type="text" class="form-control" name="name">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection


