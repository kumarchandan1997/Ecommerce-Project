@extends('layouts.front ')

@section('title')
Welcome to E-shop
@endsection

@section('content')


<div class="py-5">
    <div class="container">
    <h2>{{$category->name}}</h2>
        <div class="row">
            @foreach($featured_product as $featured)
            <div class="col-md-3 mt-3">
                <a href="{{url('category/'.$category->slug.'/'.$featured->slug) }}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/product/'.$featured->image) }}" style="float: left;
                     width:  250px;
                      height: 200px;
                        object-fit: cover;" alt="product image">
                    <div class="card-body">
                        <h5>{{$featured->name}}</h5>
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





@endsection 
