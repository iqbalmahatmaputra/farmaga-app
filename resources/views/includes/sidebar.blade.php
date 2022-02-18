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
          <a class="nav-link" href="index.html">
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
                  <a class="collapse-item" href="{{route ('warehouse.index')}}">Dashboard</a>
                  <a class="collapse-item" href="{{route ('productOrder.index')}}">Order List</a>
                  <a class="collapse-item" href="{{route ('productOrder.index')}}">Order PBF</a>

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
                  <a class="collapse-item" href="{{route ('distributor.index')}}">Distributor List</a>
                  <a class="collapse-item" href="{{route ('product.index')}}">Product List</a>
                  <a class="collapse-item" href="{{route ('productPrice.index')}}">Product Price List</a>
              </div>
          </div>
      </li>
      @elseif ( Auth::user()->roles == "ADMIN")
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
                  <a class="collapse-item" href="{{route ('productOrder.create')}}">Order Products</a>
                  <a class="collapse-item" href="{{route ('productOrder.index')}}">Confirmation Products</a>
              </div>
          </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->

      <!-- Cabangs Side -->

      <!-- End Cabang Side -->
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
              aria-expanded="true" aria-controls="collapsePages">
              <i class="fas fa-fw fa-folder"></i>
              <span>Pages</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Login Screens:</h6>
                  <a class="collapse-item" href="login.html">Login</a>
                  <a class="collapse-item" href="register.html">Register</a>
                  <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                  <div class="collapse-divider"></div>
                  <h6 class="collapse-header">Other Pages:</h6>
                  <a class="collapse-item" href="404.html">404 Page</a>
                  <a class="collapse-item" href="blank.html">Blank Page</a>
              </div>
          </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
          <a class="nav-link" href="charts.html">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
          <a class="nav-link" href="tables.html">
              <i class="fas fa-fw fa-table"></i>
              <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
  <!-- End of Sidebar -->
