 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->

     <div class="row">
         <div class="col-xl-12 col-md-12 mb-4">
             <div class="card card-waves mb-4 card-svg">
                 <div class="card-body p-5">
                     <div class="row align-items-center justify-content-between">
                         <div class="col">
                             <h2 class="text-primary">{{$title}}</h2>
                             <p class="text-gray-700">Great job, your Warehouse System is ready to go! You can view
                                 order, request to PBF, see reports, and manage your orders using this Warehouse system.
                             </p>

                         </div>
                         <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5"
                                 src="{{ url('backend/img/statistics.svg') }}" /></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Content Row -->
     <div class="row">

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Costs (Day)</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($harian)</div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-calendar fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-success shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Costs (Total)</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($costAll->total)</div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-info shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                             <div class="row no-gutters align-items-center">
                                 <div class="col-auto">
                                     <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                         {{ round(($totalSelesaiOrder*100)/$totalOrder,2)}}%</div>
                                 </div>
                                 <div class="col">
                                     <div class="progress progress-sm mr-2">
                                         <div class="progress-bar bg-info" role="progressbar"
                                             style="width: {{ round(($totalSelesaiOrder*100)/$totalOrder,2)}}%"
                                             aria-valuenow="{{ round(($totalSelesaiOrder*100)/$totalOrder,2)}}"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-warning shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests
                             </div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalPendingOrder}}<small>
                                     order</small></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-comments fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>


 </div>
 <!-- /.container-fluid -->

 <div class="container-fluid">
     <h1 class="h3 p-2 text-gray-800">Pengeluaran Percabang</h1>
     <!-- Page Heading -->

     <div class="row">
         <div class="col-lg-8 col-md-8 col-xs-12">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Seluruh</h6>
                     <div class="dropdown no-arrow">
                         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
                             <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                             <div class="dropdown-header">Dropdown Header:</div>
                             <a class="dropdown-item" href="#">Action</a>
                             <a class="dropdown-item" href="#">Another action</a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="#">Something else here</a>
                         </div>
                     </div>
                 </div>

                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered display-responsive text-center">
                             <thead>
                                 <tr>
                                     <!-- <th>No</th> -->
                                     <th>Cabang</th>
                                     <th>Total Pengeluaran</th>
                                     <th>Total Order</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no=1; ?>
                                 @forelse ($pengeluarans as $item)
                                 <tr>
                                     <!-- <td>{{$no++}}</td> -->
                                     <td>{{$item->cabang}}</td>
                                     <td>@currency($item->total)</td>
                                     <td>{{$item->totalOrder}}</td>
                                 </tr>
                                 @empty
                                 <tr>
                                     <td colspan="3">Data Kosong</td>
                                 </tr>
                                 @endforelse
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-4 col-md-4 col-xs-12">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Bulan {{date('F Y')}}</h6>
                     <div class="dropdown no-arrow">
                         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
                             <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                             <div class="dropdown-header">Dropdown Header:</div>
                             <a class="dropdown-item" href="#">Action</a>
                             <a class="dropdown-item" href="#">Another action</a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="#">Something else here</a>
                         </div>
                     </div>
                 </div>

                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered display-responsive text-center">
                             <thead>
                                 <tr>
                                     <th>Cabang</th>
                                     <th>Total Pengeluaran</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no=1; ?>
                                 @forelse ($pengeluaranBulanan as $item)
                                 <tr>
                                     <td>{{$item->cabang}}</td>
                                     @if ($item->total >= $item->limit_perbulan)
                                     <td><span class="text-danger">@currency($item->total)</span></td>

                                     @else
                                     <td>@currency($item->total)</td>
                                     @endif
                                 </tr>
                                 @empty
                                 <tr>
                                     <td colspan="3">Data Kosong</td>
                                 </tr>
                                 @endforelse
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>
 <div class="container-fluid">
     <h1 class="h3 p-2 text-gray-800">Pengeluaran Perdistributor</h1>
     <!-- Page Heading -->

     <div class="row">
         <div class="col-lg-12 col-md-12 col-xs-12">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Stok</h6>
                     <div class="dropdown no-arrow">
                         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
                             <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                             <div class="dropdown-header">Dropdown Header:</div>
                             <a class="dropdown-item" href="#">Action</a>
                             <a class="dropdown-item" href="#">Another action</a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="#">Something else here</a>
                         </div>
                     </div>
                 </div>

                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered display-responsive text-center table-hover">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Distributor</th>
                                     <th>Total Faktur</th>
                                     <th>Total Pengeluaran</th>
                                     <th>Jenis</th>
                                     <th>Tanggal Pembayaran</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no=1; ?>
                                 @forelse ($pbf as $item)
                                 <tr>
                                     <td>{{$no++}}</td>
                                     <td>{{$item->nama_distributor}}</td>
                                     <td>{{$item->jumlahOrder}}</td>
                                     @if ($item->jenis == 'Kredit')
                                     <td><span class="text-danger">@currency($item->total)</span></td>
                                     <td><span class="text-danger">{{$item->jenis}}</span></td>
                                     <td><div class="text-danger animate__animated animate__tada animate__repeat-3">{{date("Y-m-d", strtotime($item->tanggal_pembayaran))}}</div></td>  
                                     @else
                                       
                                     <td>@currency($item->total)</td>
                                     <td>{{$item->jenis}}</td>
                                     <td>{{date("Y-m-d", strtotime($item->tanggal_pembayaran))}}</td>
                                     @endif

                                 </tr>
                                 @empty
                                 <tr>
                                     <td colspan="6">Data Kosong</td>
                                 </tr>
                                 @endforelse
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>

 </div>
