@extends('layouts.admin')

@section('content')
<div class="card">
    <div>
    <a href="{{url('add-product_attribute')}}"><button class="btn btn-success float-right">Add Product Attribute </button></a>
</div>    
<div class="card-header">
<h4>Product Attribute Page</h4>

</div>
<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
    

        @foreach($product_attribute as $attribute)
        <tbody>
            <tr>
                <td>{{$attribute->id}}</td>
                <td>{{$attribute->name}}</td>
                <td>{{$attribute->created_at}}</td>
                
                <td>
                <a href="/edit/{{$attribute->id}}"><button class="btn btn-warning">Edit</button></a>
                <a href="{{ url('delete/'.$attribute->id) }}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
        </tbody>
   @endforeach
    </table>
</div>
</div>
@endsection