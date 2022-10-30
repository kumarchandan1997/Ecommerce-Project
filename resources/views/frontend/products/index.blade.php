@extends('frontend.master')

@section('title')
{{$category->name}}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection / {{$category->name}}</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
    <h2>{{$category->name}}</h2>
        <div class="row">
            @foreach($products as $featured)
            <div class="col-md-3 mt-3">
                <div class="card">
                    <a href="{{url('category/'.$category->slug.'/'.$featured->slug) }}">
                    <img src="{{ asset('assets/uploads/product/'.$featured->image) }}" style="float: left;
                           width:  250px;
                            height: 200px;
                            object-fit: cover;" alt="product image">
                      <div class="card-body">
                        <h5>{{$featured->name}}</h5>
                        <!-- <small>{{$featured->small_description}}</small> -->
                        <span class="float-start">{{ $featured->selling_price }}</span>
                        <span class="float-end"><s>{{ $featured->original_price }}</s></span>
                    </div>
</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection