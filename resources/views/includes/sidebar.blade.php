  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Farmaga <sup><small>Warehouse</small></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
          <a class="nav-link" href="{{route ('home')}}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Admins Side -->
      @if(Auth::check() && Auth::user()->roles == "ADMIN" || Auth::user()->roles == "GDG")
      <!-- Heading -->
      <div class="sidebar-heading">
          Admin
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWarehouse" aria-expanded="true"
              aria-controls="collapseTwo">
              <i class="fas fa-fw fa-boxes"></i>
              <span>Warehouse</span>
          </a>
          <div id="collapseWarehouse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Transaction Data</h6>
                  <a class="collapse-item" href="{{route ('productOrder.index')}}">List Order (Cabang)</a>
                  <a class="collapse-item" href="{{route ('warehouse.index')}}">List Order (PBF)</a>
                  <a class="collapse-item" href="{{route ('productStock.index')}}">List Stok Produk</a>
                  <a class="collapse-item" href="{{route ('payment.index')}}">List Hutang</a>

              </div>
          </div>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
              aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Master Data</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Custom Master Data</h6>
                  <a class="collapse-item" href="{{route ('distributor.index')}}">List Distributor </a>
                  <a class="collapse-item" href="{{route ('product.index')}}">List Produk</a>
                  <a class="collapse-item" href="{{route ('productPrice.index')}}">List Harga Produk</a>
                  <a class="collapse-item" href="{{route ('cabang.index')}}">List Cabang</a>
              </div>
          </div>
      </li>
    
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
              aria-expanded="true" aria-controls="collapseUtilities">
              <i class="fas fa-fw fa-user"></i>
              <span>Data Account</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
              data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Custom Data Account</h6>
                  <a class="collapse-item" href="{{route ('user.index')}}">User</a>
              </div>
          </div>
      </li>
      @endif
      <!-- Heading -->
      <div class="sidebar-heading">
          Employee
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePegawai"
              aria-expanded="true" aria-controls="collapsePegawai">
              <i class="fas fa-fw fa-cog"></i>
              <span>Employee</span>
          </a>
          <div id="collapsePegawai" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Activity</h6>
                  <a class="collapse-item" href="{{route ('productOrder.index')}}">Order Products List</a>
                  <a class="collapse-item" href="{{route ('bantuan.index')}}">List Bantuan</a>
              </div>
          </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->

      <!-- Cabangs Side -->

      <!-- End Cabang Side -->
    
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
  <!-- End of Sidebar -->
