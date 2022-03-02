        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <?php 
                     $today = date('Y.m.d');
                     $jumlah_order =0;
                     $jumlah_datang =0;
                     $jumlah_bantuan =0;
                     $nomor_order = sprintf("%03s", abs(Auth::user()->id_cabang))."/".Auth::user()->cabang."/".$today;
                     $jumlah_order = DB::table('v_order_products_user')->where('nomor_order',$nomor_order)->where('status_order','Keranjang')->count();
                     $jumlah_bantuan = DB::table('requests')->where('status','Belum')->count();
                     $jumlah_datang = DB::table('v_order_user_cabang')->where('id_cabang',Auth::user()->id_cabang)->where('status_order','Kirim')->count()
                     ?>
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
            @if ($jumlah_order >= 1 || $jumlah_datang >= 1 || $jumlah_bantuan >= 1)
              <a class="nav-link dropdown-toggle animate__animated animate__tada animate__infinite" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @else
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  @endif
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{$jumlah_order+$jumlah_datang+$jumlah_bantuan}}</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <button class="dropdown-item d-flex align-items-center" data-toggle="modal" data-target="#exampleModalCenter">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{Carbon\Carbon::today()->isoFormat('dddd, D MMMM Y')}}</div>
                    
                     @if ($jumlah_order >= 1)
                       
                     <span class="font-weight-bold">Ada {{$jumlah_order}} produk didalam <b>Keranjang</b> dan belum di CheckOut! </span>
                     @else
                     <span class="font-weight-bold">Kamu belum pesan apa-apa! </span>
                     @endif
                  </div>
                </button>
                @if ($jumlah_datang >= 1)
                <a class="dropdown-item d-flex align-items-center" href="{{route ('productOrder.index')}}">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                    <span class="icon text-white"> <i class="fas fa-shipping-fast"></i></span>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo date('l jS \of F Y ');?></div>
                    Orderan kamu sudah sampai!
                  </div>
                </a>
@endif
<?php
$bantuan = DB::table('requests')->where('status','Belum')->get();
?>
@forelse ($bantuan as $item)
<a class="dropdown-item d-flex align-items-center" href="{{route ('bantuan.index')}}">
  <div class="mr-3">
    <div class="icon-circle bg-warning">
      <i class="fas fa-exclamation-triangle text-white"></i>
    </div>
  </div>
  <div>
    <div class="small text-gray-500">{{Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y') }}</div>
    Butuh Bantuan: {{$item->nama_peminta}} membutuhkan pasokan {{$item->nama_product}} dengan jumlah {{$item->jumlah}} !
  </div>
</a>
  
@empty
  
@endforelse
                <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
              </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#profilModal">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        @include('components/productOrder')