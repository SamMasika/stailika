@extends('layouts.admin')

@section('title')
    Orders
@endsection
@section('content')
            <div class="card">
                <div class="card-header bg-primary">
              <h4>New Orders
                <a href="{{url('order-history')}}" class="btn btn-success float-right">Order History</a>
              </h4>
                </div>
            </div>
            <div class="card">
                {{-- <div class="card-body"> --}}
                    <table class="table responsive table-hover w-auto">
                        <thead>
                           <tr>
                             <th>ID</th>
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
                            <th>{{$ord->id}}</th>
                              <td>{{date('d-m-y',strtotime($ord->created_at))}}</td>
                              <td>{{$ord->tracking_no}}</td>
                              <td>{{$ord->total_price}}</td>
                              <td>{{$ord->status=='0'?'pending':'completed'}}</td>
                              <td>
                                <div class="">
                                 <a href="{{url('view-orders/'.$ord->id)}}" class=""><i class="fa fa-eye" title="View"></i></a>
                                 <a href="{{url('delete-order/'.$ord->id)}}" class=""><i class="fa fa-trash" title="Delete"></i> </a>
                                </div>
                                </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                </div>
@endsection