<div class="sidebar-wrapper">
  <ul class="nav">
    <li class="nav-item {{Request::is('dashboard')?'active':''}}  ">
      <a class="nav-link" href="/dashboard"><i class="material-icons">dashboard</i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item {{Request::is('categories')?'active':''}}">
      <a class="nav-link" href="{{url('categories')}}">
        <i class="material-icons">category</i>
        <p>Categories</p>
      </a>
    </li>
    <li class="nav-item {{Request::is('products')?'active':''}}">
      <a class="nav-link" href="{{url('products')}}">
        <i class="material-icons">Product</i>
        <p>Products</p>
      </a>
    </li>
    <li class="nav-item {{Request::is('orders')?'active':''}} ">
      <a class="nav-link" href="{{url('orders')}}">
        <i class="material-icons">content_paste</i>
        <p>Orders</p>
      </a>
    </li>
    <li class="nav-item {{Request::is('shops')?'active':''}} ">
      <a class="nav-link" href="{{url('shops')}}">
        <i class="material-icons">content_paste</i>
        <p>Shops</p>
      </a>
    </li>
    

    {{-- @can('view-settings') --}}
   
    {{-- <li class="nav-item {{Request::is('users')?'active':''}} ">
      <a class="nav-link" href="{{url('users')}}">
        <i class="material-icons">person</i>
        <p>Users</p>
      </a>
    </li> --}}
    <li class="nav-item {{Request::is('user')?'active':''}} ">
      <a class="nav-link" href="{{url('user')}}">
        <i class="material-icons">person</i>
        <p>Users</p>
      </a>
    </li>
        <li class="nav-item {{Request::is('permissions-list')?'active':''}} ">
          <a class="nav-link" href="{{url('permissions-list')}}">
            <i class="material-icons">content_paste</i>
            <p>Permission Management</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('roles-list')?'active':''}} ">
          <a class="nav-link" href="{{url('roles-list')}}">
            <i class="material-icons">content_paste</i>
            <p>Role Management</p>
          </a>
        </li>
    {{-- @endcan --}}
   
  </ul>
</div>