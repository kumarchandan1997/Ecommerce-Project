@extends('layouts.admin')

@section('content')
<div class="card">
    <div>
    <a href="{{url('add-product')}}"><button class="btn btn-success float-right">Add Product</button></a>
</div>    
<div class="card-header">
<h4>Product Page</h4>

</div>
<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Selling Price</th>
                <th>Small Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
    

        @foreach($product as $cat)
        <tbody>
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->selling_price}}</td>
                <td>{{$cat->small_description}}</td>
                <td>
                    <img src="{{asset('assets/uploads/product/'.$cat->image)}}" class="cate-image" alt="Image here">
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