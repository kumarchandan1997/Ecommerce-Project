@extends('frontend.master')
@section('title',$products->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purches->count()> 0)
                    <h5>You are writing a review for {{$products->name}}</h5>
                    <form action="{{url('add-review')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$products->id}}">
                        <textarea class="form-control" name="reviews" row="5" placeholder="write a review"></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                    </form >
                    @else
                    <div class="alert alert-danger">
                        <h5>You are not eligible to review this product</h5>
                        <p>
                            For the trusthworthiness of the rewiew , only customer who Purched the product can write review.
                        </p>
                        <a href=" {{url('/')}}" class="btn btn-primary mt-3">Go To Home page</a>
                    </div>
                    @endif
                    </div>
            </div>
        </div>
    </div>
</div>





@endsection
