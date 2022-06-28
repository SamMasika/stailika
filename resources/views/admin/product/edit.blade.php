<div class="modal fade" id="ModalEdit{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <form action="{{url('update-prod/'.$product->id)}}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="row">
        <div class="col-md-12 mb-3">
            <select class="form-select">
                <option value="">{{$product->category->name}}</option>
              </select>
        </div>
      <div class="col-md-6 mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}">
      </div>

      <div class="col-md-6 mb-3">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
      </div>

      <div class="col-md-12 mb-3">
        <label for="small_desc">Small Description</label>
        <textarea name="small_desc" class="form-control" rows="3">{{$product->small_desc}}</textarea>
      </div>
      <div class="col-md-12 mb-3">
        <label for="desc">Description</label>
        <textarea name="desc" class="form-control" rows="3">{{$product->desc}}</textarea>
      </div>
      <div class="col-md-6 ">
        <label for="">Original Price</label>
        <input type="number" class="form-control" name="origin_price" value="{{$product->origin_price}}">
      </div>
      <div class="col-md-6 ">
        <label for="">Selling Price</label>
        <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
      </div>
      <div class="col-md-6 ">
        <label for="">Quantity</label>
        <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}" >
      </div>
      <div class="col-md-6 ">
        <label for="">Tax</label>
        <input type="number" class="form-control" name="tax" value="{{$product->tax}}">
      </div>
      <div class="col-md-6 mb-3">
        <label for="">Status</label>
        <input type="checkbox" name="status" {{$product->status=="1"?'checked':''}}>
      </div>

      <div class="col-md-6 mb-3">
        <label for="">Trending</label>
        <input type="checkbox" name="trending" {{$product->trending=="1"?'checked':''}}>
      </div>

      <div class="col-md-12 mb-3">
        <label for="meta_title">Meta Title</label>
        <textarea name="meta_title" class="form-control" rows="3">{{$product->meta_title}}</textarea>
      </div>

      <div class="col-md-12 mb-3">
        <label for="meta_desc">Meta Description</label>
        <textarea name="meta_desc" class="form-control" rows="3">{{$product->meta_desc}}</textarea>
      </div>

      <div class="col-md-12 mb-3">
        <label for="meta_key">Meta Keywords</label>
        <textarea name="meta_key" class="form-control" rows="3">{{$product->meta_key}}</textarea>
      </div>

      @if ($product->image)
      <img src=" {{asset('admin/images/product/'.$product->image)}}" alt="Product-Image" class="prod-img"> 
      @endif
      <div class="col-md-12">
         <input type="file" class="form-control" name="image">
       </div>

      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
    </form>
        </div>
    </div>
  </div>
