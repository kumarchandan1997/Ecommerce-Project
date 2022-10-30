@extends('frontend.master')
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection /Cart</h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
            @php  $total=0; @endphp
            @foreach($cartitems as $items)
            <div class="row">
               <div class="col-md-3">
                    <img src="{{asset('assets/uploads/product/'.$items->products->image)}}" height="200px" width="150px" class="w-100" alt="">
                </div>
                    <div class="col-md-2 shift">
                         <h3> {{$items->products->name}} </h3>
                         
                    </div>
                    <div class="col-md-2 shift">
                         <h3> RS {{$items->products->selling_price *$items->prod_qty}} </h3>
                         
                    </div>  
                    <div class="col-md-3">
                            <input type="hidden" class="prod_id" value="{{$items->prod_id}}">
                            <label for="quantity">Quantity</label>
                          <div class="input-group text-center mb-3">
                             <span class="input-group-text decrement-btn">-</span>
                             <input type="text" name="quantity" value="{{$items->prod_qty}}" class="form-control text-center qty-input" />
                             <span class="input-group-text increment-btn">+</span>
                          </div>
                        </div>
                        <div class="col-md-2 mb-3">
                          <button class="btn btn-danger delete-cart-item">Remove</button>
                        </div>      
            
            </div>
            @php
            $total +=$items->products->selling_price *$items->prod_qty;
             @endphp
            @endforeach
        </div>
         <div class="card-footer">
            <h6>Total Price :{{$total}}
               <a href="{{url('checkout')}}"> <center><button class="btn btn-success float-end">Proceed to CheckOut</button></center>
</a>
            </h6>
        </div>
    </div>
</div>


@endsection