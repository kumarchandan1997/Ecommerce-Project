@extends('frontend.master')
@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="post" action="{{ url('/add-rating') }}"> 
            @csrf
            <input type="hidden" name="product_id" value={{$products->id}}>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate This {{$products->name}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="rating-css">
           <div class="star-icon">
        <input type="radio" value="1" name="product_rating" checked id="rating1">
        <label for="rating1" class="fa fa-star"></label>
        <input type="radio" value="2" name="product_rating" id="rating2">
        <label for="rating2" class="fa fa-star"></label>
        <input type="radio" value="3" name="product_rating" id="rating3">
        <label for="rating3" class="fa fa-star"></label>
        <input type="radio" value="4" name="product_rating" id="rating4">
        <label for="rating4" class="fa fa-star"></label>
        <input type="radio" value="5" name="product_rating" id="rating5">
        <label for="rating5" class="fa fa-star"></label>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

      <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection / {{$products->name}} / {{$products->name}}</h6>
    </div>
</div>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/product/'.$products->image) }}" class="w-100 image1" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$products->name}}
                        @if($products->trending == '1')
                        <label style="font-size:16px;" class="float-right badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3">Original Price :<s>Rs {{$products->original_price}}</s></label>
                    <label class="fw-bold">Selling Price :Rs {{$products->original_price}}</label>
                    @php $rate=$rating_value @endphp
                    <div class="rating">
                        @for($i=1 ;$i<=$rate ; $i++)
                        <i class="fa fa-star checked"></i>
                        @endfor
                        @for($j=$rate+1 ;$j<=5 ; $j++)
                        <i class="fa fa-star"></i>
                        @endfor
                        <span>
                            @if($ratings->count() >0)
                            {{ $ratings->count() }} Ratings
                            @else
                            No Rating
                            @endif
                        </span>
                    </div>
                    <p class="mt-3">
                        {!! $products->small_description !!}
                    </p>
                    
                    <hr>
                    @if($products->qty >0)
                    <label class="badge bg-success">In Stock</label>
                    @else
                    <label class="badge bg-danger">Out Of Stock</label>
                    @endif
                    

                    
        
<!-- <div>
@foreach($attribute_values as $values)
    <select class="form-select">
            <option value="">Select Color</option>
            <option value=""> {{$values->product_attribute_id}}</option>
          </select>
          <select class="form-select" >
            <option value="">Select Size</option>
            <option value=""></option>
          </select>
          @endforeach
</div> --> 


                       <div class="row mt-2">
                        <div class="col-md-3">
                        <select class="form-select">
                        <option value="">Select Color</option>
                        @foreach($attribute_values as $values)
                        @if($values->product_id == $products->id && $values->product_attribute_id == 'Color')
                        <option value=""> {{$values->value}}</option>
                        @endif
                         @endforeach
                         </select>
                        </div>
                       
                        <div class="col-md-3">
                        <select class="form-select">
                        <option value="">Select Size</option>
                        @foreach($attribute_values as $values)
                        @if($values->product_id == $products->id && $values->product_attribute_id == 'Size')
                        <option value=""> {{$values->value}}</option>
                        @endif
                         @endforeach
                         </select>
                        </div>
                    </div>
                  



        
                 



                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <label for="quantity">Quantity</label>
                         <div class="input-group text-center mb-3">
                            <span class="input-group-text decrement-btn">-</span>
                            <input type="text" name="quantity" value="1" class="form-control text-center qty-input" />
                            <span class="input-group-text increment-btn">+</span>
                          </div>
                        </div>
                        <div class="col-md-9">
                           <br/>
                           <button type="button" class="btn btn-success me-3 float-start whishlist" id="sweet">Add To Wishlist </button>
                           <button type="button" id="press" class="btn btn-primary me-3 addToCartBtn float-start">Add To Cart <i class="fa fa-shoppingcart"> </i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="card shadow product_data">
    <div class="row">
        <div class="col-md-12">
        
            <h3 class="area">Description</h3>
            <p class="mb-3 area">
                {!! $products->description!!}
            </p>
            <!-- Button trigger modal -->
            <hr>
            </div>
         <div class="col-md-4">
        <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-link"> Rate This Product</a>
        <a href="{{url('add-review/'.$products->slug.'/userreview') }}" class="btn btn-link ">Write a Review</a>
        </div>
        <div class="col-md-8">
            @foreach($reviews as $items)
            <div class="user-review">
        <label for="">{{$items->user->name}}</label>
        @if($items->user_id ==Auth::id())
        <a href="{{url('edit-review/'.$products->slug.'/userreview') }}">Edit</a>
        @endif
        <br>
        @if($items->rating)
        @php $user_rated =$items->rating->stars_rated @endphp
        @for($i=1 ;$i<=$user_rated; $i++)
        <i class="fa fa-star checked"></i>
        @endfor
        @for($j=$user_rated+1 ;$j<=5; $j++)
        <i class="fa fa-star"></i>
        @endfor
        @endif
        
        <small>Reviewed On {{date('d-m-Y', strtotime($items->created_at))}}</small>
        <p>{{$items->reviews}}</p>
        </div>
       @endforeach
       </div>
    </div>
    </div>
</div>
@endsection
  


