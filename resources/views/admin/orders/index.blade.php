@extends('layouts.admin')

@section('title')
    Orders
@endsection
@section('content')
            <div class="card">
                <div class="card-header bg-primary">
              <h4>New Orders
                <a href="{{url('order-history')}}" class="btn btn-success float-right"  data-bs-toggle="modal" data-bs-target="#orderModal">Order History</a>
              </h4>
                </div>
            </div>
            {{-- <div class="card"> --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="orders">
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
                                 <a href="#" data-bs-toggle="modal" data-bs-target="#ModalDelete{{$ord->id}}"><i class="fa fa-trash" title="Delete"></i> </a>
                              @include('admin.orders.delete')  
                              </div>
                                </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                </div>

                <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order History</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                       
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
                             @foreach ($h_orders as $orders)
                             <tr>
                                <td>{{date('d-m-y',strtotime($orders->created_at))}}</td>
                                <td>{{$orders->tracking_no}}</td>
                                <td>{{$orders->total_price}}</td>
                                <td>{{$orders->status=='0'?'pending':'completed'}}</td>
                                <td>
                                   <a href="{{url('view-orders/'.$orders->id)}}" class="" ><i class="fa fa-eye"></i></a>
                                   <a href="{{url('delete-order/'.$orders->id)}}" class=""><i class="fa fa-trash"></i> </a>
                                </td>
                             </tr>
                             @endforeach
                          </tbody>
                       </table>
                      </div>
                    </div>
                
@endsection