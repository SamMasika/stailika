@extends('layouts.front')

@section('title')
   Checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
            Home
            </a>/
            <a href="{{url('checkout')}}">
            Checkout
            </a>
        </h6>
    </div>
</div>
<div class="container mt-5">
    <form action="{{url('place-order')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6 mt-3">
                            <label for="">FirstName</label>
                            <input type="text" required name="fname" value ="{{Auth::user()->name}}" class="form-control firstname" placeholder="Enter First Name">
                        <span id="fname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">LastName</label>
                            <input type="text" class="form-control lastname" name="lname"  value ="{{Auth::user()->lname}}" placeholder="Enter Last Name">
                            <span id="lname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3 ">
                            <label for="">Email</label>
                            <input type="text" class="form-control email" name="email"  value ="{{Auth::user()->email}}" placeholder="Enter Email">
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control phone" name="phone"  value ="{{Auth::user()->phone}}" placeholder="Enter LastName">
                            <span id="phone_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address1</label>
                            <input type="text" class="form-control address1" name="address1"  value ="{{Auth::user()->address1}}" placeholder="Enter Email">
                            <span id="address1_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address2</label>
                            <input type="text" class="form-control address2" name="address2"  value ="{{Auth::user()->address2}}" placeholder="Enter First Name">
                            <span id="address2_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="FirstName">City</label>
                            <input type="text" class="form-control city"  value ="{{Auth::user()->city}}" placeholder="Enter First Name" name="city">
                            <span id="city_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">State</label>
                            <input type="text" class="form-control state"  value ="{{Auth::user()->state}}" placeholder="Enter First Name" name="state">
                            <span id="state_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control country"  value ="{{Auth::user()->country}}" placeholder="Enter First Name" name="country">
                            <span id="country_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Pincode</label>
                            <input type="text" class="form-control pincode"  value ="{{Auth::user()->pincode}}" placeholder="Enter First Name" name="pincode">
                            <span id="pincode_error" class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order Details</h6>
                    @if($cartitems->count()>0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total=0;  @endphp
                            @foreach ($cartitems as $item)
                            <tr>
                                @php
                                $total+=$item->product->selling_price*$item->prod_qty;
                            @endphp
                            <td> {{$item->product->name}}</td>
                            <td> {{$item->prod_qty}}</td>
                            <td>Tsh. {{$item->product->selling_price}}/=</td>
                            </tr>
                        
                        @endforeach 
                        </tbody>
                    </table>
                    <h6 class="px-4">Grand Total:<span class="float-end">Tsh.{{$total}}/=</span></h6>
                    <hr>
                    <input type="hidden" name="payment_mode" value="COD">
                    <button type="submit" class="btn btn-success float-end btn-block">Place Order|COD</button>
                    {{-- <button type="button" class="btn btn-primary w-100 mt-2 razorpay_btn">Pay with Razorpay</button> --}}
                    <div id="paypal-button-container"></div>
                    @else
                        <h4>No Products in the Cart</h4>
                   
                    @endif
                
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection

@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=ARBSwdSKC2t7sHEFBcMzYz6oslEEesQRJEvgarcu6CR5VnF4vXxAcgvHu3doE409k_CDKGs-XHuPPkBo"></script>
<script>
    paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
             value: '1'// Can also reference a variable or function
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
        //  console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        //   const transaction = orderData.purchase_units[0].payments.captures[0];
        //   alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                            
            var  firstname = $('.firstname').val();
            var  lastname=$('.lastname').val();
            var  email=$('.email').val();
            var  phone =$('.phone').val();
            var  address1=$('.address1').val();
            var  address2=$('.address2').val();
            var  city=$('.city').val();
            var  state=$('.state').val();
            var  country=$('.country').val();
            var  pincode=$('.pincode').val();
                   $.ajax({
                                        method: "post",
                                        url: "/place-order",
                                        data: {
                                            'fname':firstname,
                                            'lname':lastname,
                                            'email':email,
                                        'phone':phone,
                                        'address1':address1,
                                            'address2':address2,
                                            'city':city,
                                        'state':state,
                                        'country':country,
                                            'pincode':pincode,
                                            'payment_mode':"Paid by Paypal",
                                            'payment_id':orderData.id,
                                    },
                                    success: function (response) {
                                        // alert(responseb.status)
                                        swal(response.status);
                                        window.location.href="/my-orders"
                                    }
                                });
          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
    }).render('#paypal-button-container');
  </script>
@endsection