@extends('layouts.admin')


@section('title')
User
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4> Register User
                      <!-- <button class="btn btn-warning float-right"></button> -->
                     </h4>
                </div>
                <div class="card-body">
            <table class="table table-borderd">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>
                            <a href="{{url('view_user/'.$order->id) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
           </table>
</div>
</div>
        </div>
    </div>
</div>

@endsection