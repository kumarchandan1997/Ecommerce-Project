<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
          E-Shop
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('dashboard') ? 'active':''}}  ">
            <a class="nav-link" href="dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('categories') ? 'active':''}} ">
            <a class="nav-link" href="{{url('categories')}}">
              <i class="material-icons">person</i>
              <p>Category</p>
            </a>
          </li>

          <li class="nav-item {{ Request::is('products') ? 'active':''}} ">
            <a class="nav-link" href="{{url('products')}}">
              <i class="material-icons">person</i>
              <p>Product</p>
            </a>
            <li class="nav-item {{ Request::is('admin_orders') ? 'active':''}} ">
            <a class="nav-link" href="{{url('admin_orders')}}">
              <i class="material-icons">person</i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('users') ? 'active':''}} ">
            <a class="nav-link" href="{{url('users')}}">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
            <li class="nav-item {{ Request::is('product-attribute') ? 'active':''}} ">
            <a class="nav-link" href="{{url('product-attribute')}}">
              <i class="material-icons">person</i>
              <p>Product Attribute</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>Table List</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>