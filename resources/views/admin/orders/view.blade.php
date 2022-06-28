@extends('layouts.front')

@section('title')
   Order View
@endsection

@section('content')
   <div class="container py-5">
      <div class="row">
         <div class="col-md-12">
            <div class="card shadow">
               <div class="card-header bg-primary">
                  <h4>Order View
                  <a href="{{url('orders')}}" class="btn btn-success float-end">Back</a>
               </h4>
               </div>
           
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6 order_details">
                     <h4>Shipping Details</h4>
                     <hr>
                     <label for="">First Name</label>
                     <div class="border">{{$orders->fname}}</div>
                     <label for="">Last Name</label>
                     <div class="border">{{$orders->lname}}</div>
                     <label for="">Email</label>
                     <div class="border">{{$orders->email}}</div>
                     <label for="">Contact No.</label>
                     <div class="border">{{$orders->phone}}</div>
                     <label for="">Email</label>
                     <div class="border">{{$orders->email}}</div>
                     <label for="">Shipping Address</label>
                     <div class="border">
                        {{$orders->address1}},<br>
                        {{$orders->address2}},<br>
                        {{$orders->city}},<br>
                        {{$orders->state}},
                        {{$orders->country}},
                     </div>
                     <label for="">Zip code</label>
                     <div class="border">{{$orders->pincode}}</div>
                  </div>
                  <div class="col-md-6 ">
                     <h4>Order Details</h4>
                     <hr>
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Image</th>
                             
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($orders->orderitem as $ord)
                           <tr>
                           <td>{{$ord->product->name}}</td>
                           <td>{{$ord->qty}}</td>
                           <td>{{$ord->price}}</td>
                           <td>
                      <img src="{{url('admin/images/product/'.$ord->product->image)}}" alt="Image Here" class="prod_image">
                           </td>
                           </tr>
                           @endforeach
                             
                        </tbody>
                     </table>

                     <h6 class="px-4"><span class="float-end">Grand Total:Tsh.{{$orders->total_price}}/=</span></h6>
                
                     <div class="mt-5 px-2">
                     <label for="">Order Status</label>
                     <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                     <select class="form-select" name="order_status">
                        <option {{$orders->status=='0'?'selected':''}} value="0">Pending</option>
                        <option  {{$orders->status=='1'?'selected':''}} value="1">Completed</option>
                      </select>
                      <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                    </form>
                    </div>
                    
                    </div>
               </div>
               
            </div>
          
         </div>
      </div>
      </div>
   </div>
@endsection


