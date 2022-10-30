@extends('frontend.master')
@section('content')
  <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection /checkout</h6>
    </div>
</div>
<div class="container mt-5">
    <form action="{{url('place-order')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" value="{{Auth::user()->name}}" class="form-control firstname" placeholder="Enter first name">
                            <span id="fname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" value="{{Auth::user()->lname}}" class="form-control lastname" placeholder="Enter last name">
                            <span id="lname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control email" value="{{Auth::user()->email}}" placeholder="Enter Email">
                            <span id="email_error" class="text-danger"></span> 
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control phone" Value="{{Auth::user()->phone}}" placeholder="Enter Phone">
                            <span id="phone_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="address1">Address 1</label>
                            <input type="text" name="address1" class="form-control address1" value="{{Auth::user()->address1}}" placeholder="Enter Address1">
                            <span id="address1_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="address2">Address2</label>
                            <input type="text" name="address2" class="form-control address2" value="{{Auth::user()->address2}}" placeholder="Enter Address2">
                            <span id="address2_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control city" value="{{Auth::user()->city}}" placeholder="Enter City">
                            <span id="city_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="state">State</label>
                            <input type="text" name="state" value="{{Auth::user()->state}}" class="form-control state" placeholder="Enter State">
                            <span id="state_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="Country">Country</label>
                            <input type="text" name="country" class="form-control country" value="{{Auth::user()->country}}" placeholder="Enter Country">
                            <span id="country_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="Pincode">Pincode</label>
                            <input type="text" name="pincode" class="form-control pincode" value="{{Auth::user()->pincode}}" placeholder="Enter Pincode">
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
                    <hr>
      <table class="table table-striped table-borderd">
     <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  @php  $total=0; @endphp
    @foreach($cartitems as $item)
    <tr>
      <td>{{$item->products->name}}</td>
      <td>{{$item->prod_qty}}</td>
      <td>{{$item->products->selling_price}}</td>
    </tr> 
         @php
            $total +=$item->products->selling_price *$item->prod_qty;
             @endphp
            @endforeach
  </tbody>
</table>
<h6 class="px-2">Grand Total <span class="float-right"> {{$total}}</span></h6>
<hr>
<input type="hidden" name="payment_mode" value="COD">
<center><button type="submit" id="cod" class="btn btn-success w-100">Place Order | COD</button></center>
<br><center><button type="submit" class="btn btn-primary w-100 razorpay_btn">Pay with Razorpay</button></center>               
</div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection