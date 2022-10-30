@extends('frontend.master')

@section('title')
Welcome to E-shop
@endsection

@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
    <h2>Features Product</h2>
        <div class="row">
            @foreach($featured_product as $featured)
            <div class="col-md-3 mt-3">
            <a href="{{url('category/'.$featured->category->slug.'/'.$featured->slug) }}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/product/'.$featured->image) }}" class="image"  alt="product image">
                    <div class="card-body">
                        <h5>{{$featured->name}}</h5>
                        <hr>
                        <!-- <small>{{$featured->small_description}}</small> -->
                        <span class="float-start">{{ $featured->selling_price }}</span>
                        <span class="float-end"><s>{{ $featured->original_price }}</s></span>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
    <h2>Trending Category</h2>
        <div class="row">
            @foreach($category as $cate)
            <div class="col-md-3 mt-3">
            <a href="{{ url('view-category/'.$cate->slug) }}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" style="float: left;width:  250px;height: 200px; object-fit: cover;" alt="product image">
                    <div class="card-body">
                        <h5>{{$cate->name}}</h5>
                        <span class="float-start">{{ $cate->meta_description }}</span>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection 
