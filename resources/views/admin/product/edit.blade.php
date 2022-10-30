@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
<form action="{{url('/update',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12 mb-3">
         <select class="form-select">
            <option value="">{{$product->category->name}}</option>
          </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
        </div>
        <div class="col-md-12">
            <label for="">Small Description</label>
            <textarea row="3" class="form-control" name="small_description">{{$product->small_description}}</textarea>
        </div>
        <div class="col-md-12">
            <label for="">Description</label>
            <textarea row="3" class="form-control" name="description">{{$product->description}}</textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Original Price</label>
            <input type="number" class="form-control" name="original_price" value="{{$product->original_price}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Selling Price</label>
            <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Qty</label>
            <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Tax</label>
            <input type="number" class="form-control" name="tax" value="{{$product->tax}}">
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="">Status</label>
            <input type="checkbox" {{$product->status == '1' ? 'checked':''}}  name="status">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Trending</label>
            <input type="checkbox" {{$product->trending == '1' ? 'checked': ''}}  name="trending" >
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta Title</label>
            <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta Description</label>
            <input type="text" class="form-control" row="3" name="meta_description" value="{{$product->meta_description}}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta Keyword</label>
            <input type="text" class="form-control" row="3" name="meta_keywords" value="{{$product->meta_keywords}}">
        </div>
        @if($product->image)
        <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="product image">
        <div class="col-md-12">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
</div>
</div>
@endsection