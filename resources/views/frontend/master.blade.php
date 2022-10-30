<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
   
  <link rel="stylesheet" href="/resources/demos/style.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
   
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- navbar starat -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ url('/') }}">E-shop</a>
  <div class="search-bar">
  <div class="input-group"> 
  <input type="search" id="search_product" class="form-control" placeholder="Search Product" aria-label="Username" aria-describedby="basic-addon1">
    <span class="input-group-text" id="hdbcf"><i class="fa fa-search"></i></span>
  </div>
</div>
 
   
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/category')}}">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/cart')}}">Cart</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="{{url('/whistlist')}}">Whistlist</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/login') }}">Login</a>
      </li>
      <li class="nav-item">
      <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Profile
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="{{url('/whistlist')}}">Whistlist</a></li>
      <li><a href="{{url('/Logout')}}">LogOut</a></li>
      <li><a  href="{{ url('/my-orders') }}">Order</a></li>
    </ul>
  </div>
      <!-- </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/my-orders') }}">Order</a>
      </li> -->
      
    </ul>
  </div>
</nav>
    <!-- navbar end -->
      @yield('content')
      <div class="whatsapp-chat">
        <a href="https://wa.me/+919155508599?text=I'm%20interested%20in%20your%20Product%20for%20sale" target="_blank">
          <img id = "center" src="{{asset('assets/images/whatsapp-logo.png') }}" alt="whatsapp-chat">
        </a>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- @if(session('status'))
<script>
  swal({
  title: "Good job!",
  text: "{{session('status')}}",
  icon: "success",
  button: "Aww yiss!",
});
</script>

@endif -->
    @yield('scripts')
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
    <!-- write external script   -->
</body>
</html>