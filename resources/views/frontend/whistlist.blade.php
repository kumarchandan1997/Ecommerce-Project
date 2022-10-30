@extends('frontend.master')
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection /Whishlist</h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
           @if($whishlist->count()>0)
           @foreach($whishlist as $items)
           <div class="row">
               <div class="col-md-2">
                    <img src="{{asset('assets/uploads/product/'.$items->products->image)}}" height="100px" width="50px" class="w-100 image2" alt="">
                </div>
                    <div class="col-md-2 shift">
                         <h3> {{$items->products->name}} </h3>                         
                    </div>
                    <div class="col-md-2 shift">
                         <h3> RS {{$items->products->selling_price}} </h3> 
                    </div>  
                    <div class="col-md-2">
                            <input type="hidden" class="prod_id" value={{$items->products->id}}>
                            <label for="quantity">Quantity</label>
                          <div class="input-group text-center mb-3">
                             <span class="input-group-text">-</span>
                             <input type="text" name="quantity" value="{{$items->prod_qty}}" class="form-control text-center qty-input" />
                             <span class="input-group-text ">+</span>
                          </div>                      
                           
                        </div>
                        <div class="col-md-2 shift">
                          <button type="button" id="press" class="btn btn-primary float-start ">Add To Cart <i class="fa fa-shoppingcart"> </i> </button>
                        </div>  
                        <div class="col-md-2 shift">
                          <button class="btn btn-danger delete-whistlist-item ">Remove</button>
                        </div>      
            
                    </div>
                 
            @endforeach
            @else
            </div>         
           <h4>No any product added in Whishlist</h4>
           @endif
        </div>
        
    </div>



@endsection