{{-- @extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Shop</h4>
  </div>
  <div class="card-body">
 
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
@endsection --}}
