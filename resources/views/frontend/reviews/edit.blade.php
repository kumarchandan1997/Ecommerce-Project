@extends('frontend.master')
@section('title',$product->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   
                    <h5>You are writing a review for {{$review->product->name}}</h5>
                    <form action="{{url('/update-review')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <textarea class="form-control" name="reviews" row="5" placeholder="write a review">{{$review->reviews}}</textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                    </form >
                    
                    </div>
            </div>
        </div>
    </div>
</div>





@endsection
