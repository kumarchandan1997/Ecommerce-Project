@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit/update Category</h4>
    </div>
    <div class="card-body">
<form action="{{url('/update',$category->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
        </div>
        <div class="col-md-12">
            <label for="">Description</label>
            <textarea row="3" class="form-control" name="description" >{{$category->description}}</textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Status</label>
            <input type="checkbox"  name="status" {{$category->status ==1 ? 'checked':''}}>
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Popular</label>
            <input type="checkbox"  name="popular" {{$category->popular==1 ? 'checked':''}}>
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta Title</label>
            <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta Description</label>
            <input type="text" class="form-control" row="3" name="meta_descrip" value="{{$category->meta_descrip}}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta Keyword</label>s
            <input type="text" class="form-control" row="3" name="meta_keywords" value="{{$category->meta_keywords}}">
        </div>
        @if($category->image)
        <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt=" category ssimage">
        @endif
        <div class="col-md-12">
            <input type="file" name="image" class="form-control" class="cate-image" value="{{$category->image}}">
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
</div>
</div>
@endsection