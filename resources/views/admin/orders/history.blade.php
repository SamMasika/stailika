@extends('layouts.admin')

@section('title')
    Orders
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
              <h4>Order History
                <a href="{{url('orders')}}" class="btn btn-success float-right">New Orders</a>
              </h4>
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
                                 <a href="{{url('view-orders/'.$ord->id)}}" class=""><i class="fa fa-eye"></i></a>
                                 <a href="{{url('delete-order/'.$ord->id)}}" class=""><i class="fa fa-trash"></i> </a>
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