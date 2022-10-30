@extends('layouts.admin')

@section('title')
My Orders
@endsection

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                <h4 class="text-white">User Deatils
                    <!-- <a href="{{url('my-orders') }}" class="btn btn-warning text-white float-right">Back</a> -->
                </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                       
                            <hr>
                            <div class="col-md-6">
                         <label for="">Role</label>
                         <div class="border p-2">{{$user->role =='1' ? 'Admin' : 'User'}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for="">First Name</label>
                         <div class="border p-2">{{$user->name}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for="">Last Name</label>
                         <div class="border p-2">{{$user->name}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for="">Email</label>
                         <div class="border p-2">{{$user->email}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for="">Contact Number</label>
                         <div class="border p-2">{{$user->phone}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for=""> Address1</label>
                         <div class="border p-2">{{$user->address1}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for=""> Address2</label>
                         <div class="border p-2">{{$user->address2}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for="">Cirt</label>
                         <div class="border p-2">{{$user->city}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for="">State</label>
                         <div class="border p-2">{{$user->state}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for="">Country</label>
                         <div class="border p-2">{{$user->country}}</div>
                         </div>
                         <div class="col-md-6">
                         <label for="">Zip Code</label>
                         <div class="border p-2">{{$user->pincode}}</div>
                         </div>
                        </div>
                        <div class="col-md-6">
                        
                        
           
             
        </div>
                    
                </div>
                
            
            
        
             </div>
        </div>
    </div>
</div>

@endsection