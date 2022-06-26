@extends('layouts.front')
@section('title')
My Wishlist
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
            Home
            </a>/
            <a href="{{url('wishlist')}}">
            Wishlist
            </a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            @if($wishlist->count()>0)
                @foreach ($wishlist as $wish)
                <div class="row product_data">
                    <div class="col-md-2 my-auto">
                        <img src="{{url('admin/images/product/'.$wish->product->image)}}" alt="Image Here" class="cart_image">
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>{{$wish->product->name}}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>{{$wish->product->selling_price}}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <input type="hidden"  class="prod_id" value="{{$wish->prod_id}}">
                        
                        @if($wish->product->quantity >= $wish->prod_qty)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px">
                            <button class="input-group-text  decrement-btn">-</button>
                            <input type="text" name="quantity" value="1" class="form-control qty-input">
                            <button class="input-group-text  increment-btn">+</button>
                        </div>
                    @else
                    <h6>Out of Stock</h6>
                        @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-success btn-sm addToCartBtn"> <i class="fa fa-shopping-cart"></i> Add to Cart</button>
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger btn-sm remove"> <i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
               
                @endforeach
            @else
       <h4>There are no Products in your Wishlist</h4>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
   
@endsection