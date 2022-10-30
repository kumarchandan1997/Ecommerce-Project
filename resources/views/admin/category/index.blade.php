@extends('layouts.admin')

@section('content')
<div class="card">
    <div>
    <a href="{{url('add-category')}}"><button class="btn btn-success float-right">Add Category</button></a>
</div>    
<div class="card-header">
<h4>Category Page</h4>

</div>
<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($category as $cat)
        <tbody>
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->description}}</td>
                <td>
                    <img src="{{asset('assets/uploads/category/'.$cat->image)}}" class="cate-image" alt="Image here">
                </td>
                <td>
                <a href="/edit/{{$cat->id}}"><button class="btn btn-warning">Edit</button></a>
                <a href="{{ url('delete/'.$cat->id) }}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
        </tbody>
   @endforeach
    </table>
</div>
</div>
@endsection