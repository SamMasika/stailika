<div class="modal fade" id="ModalEdit{{$shop->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Shop</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('update-shop/'.$shop->id)}}" method="post" enctype="multipart/form-data">
                @csrf
          
                <div class="row">
                  <div class="col-md-12 mb-3">
                      <select class="form-select" name="user_id" >
                          <option value="">{{$shop->user->name}}</option>
                        </select>
                  </div>
          
                <div class="col-md-6 mb-3">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" value="{{$shop->name}}">
                </div>
          
                <div class="col-md-12 mb-3">
                  <label for="desc">Description</label>
                  <textarea name="description" class="form-control" rows="3"  value="">{{$shop->description}}</textarea>
                </div>
                <div class="col-md-6 ">
                  <label for="">Rating</label>
                  <input type="number" class="form-control" name="rating"  value="{{$shop->rating}}">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="">Status</label>
                  <input type="checkbox" name="status"  {{$shop->is_active=='0'?'':'checked'}}>
                  <div>
                </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              </form> 
        </div>
    </div>
  </div>
