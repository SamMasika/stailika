@extends('layouts.front')

@section('title')
   My Orders
@endsection

@section('content')
   <div class="container py-5">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header  bg-primary">
                  <h4>My Orders</h4>
               </div>
           
            <div class="card-body">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Order Date</th>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($orders as $ord)
                     <tr>
                        <td>{{date('d-m-y',strtotime($ord->created_at))}}</td>
                        <td>{{$ord->tracking_no}}</td>
                        <td>{{$ord->total_price}}</td>
                        <td>{{$ord->status=='0'?'pending':'completed'}}</td>
                        <td>
                           <a href="{{url('view-order/'.$ord->id)}}"><i class="fa fa-eye" title="View"></i></a>
                        </td>
                     </tr>
                     @endforeach
                     
                  </tbody>
               </table>
            </div>
          
         </div>
      </div>
      </div>
   </div>
@endsection