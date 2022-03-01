@extends('layouts.admin')

@section('content')
<?php $totalc = 0;?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard [Warehouse] </h1>
        <button href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#ModalInfo">
                    <span class="icon text-white-50">
                      <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Information</span>
                  </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Media Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Halaman ini memberikan informasi mengenai
        <ul>
            <li>Data yang ditampilkan adalah data yang sudah berstatus "Selesai"</li>
            <li>Jika ingin menambah Stok, silahkan pilih salah satu <strong>Distributor</strong> </li>
          
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Oke, saya mengerti</button>
       
      </div>
    </div>
  </div>
</div>
    <!-- End Modal -->
    <!-- Card Cabangs -->
    <div class="row">
        @forelse ($cabs as $cabang)
       
                                <?php 
                                // Total
                                $cari = DB::table('v_order_user_cabang')->selectRaw('count(DISTINCT nomor_order) as totalOrder,sum(harga_order*qty) as total')->where('id_cabang',$cabang->id_cabang)->where('status_order','Selesai')->first(); 
                                $totalc = $cari->total;
                                $today = date('Y.m.d');
                                $totalDay=0;
                                // Hari
                                $cariDay = DB::table('v_order_user_cabang')->selectRaw('sum(harga_order*qty) as total')->where('nomor_order','LIKE',"%$today%")->where('id_cabang',$cabang->id_cabang)->where('status_order','Selesai')->first(); 
                                $totalDay = $cariDay->total;
                                ?>
     
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">Farmaga {{$cabang->nama_cabang}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($totalc)
                            <small>/total</small></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($totalDay)
                            <small>/hari ini</small></div>
                        </div>
                        
                        
                        <div class="col-auto">
                            <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @empty
        
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">Farmaga {{$cabang->cabang}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0 <small>order</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforelse
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">List of Distributors</h1>
    </div>
    <div class="row">
    <?php $total = 0;
    $totalDay = 0;?>
        @foreach ($distr as $dist)


        <a class="col-xl-4 col-md-6 mb-4" href="{{url('/detailDist',$dist->id_distributor)}}">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">
                                {{$dist->nama_distributor}}</div>
                                <?php $cari = DB::table('v_order_user_cabang')->selectRaw('count(DISTINCT nomor_order) as totalOrder,sum(harga_order*qty) as total')->where('id_distributor',$dist->id_distributor)->where('status_order','Selesai')->first(); 
                                $cariDay = DB::table('v_order_user_cabang')->selectRaw('count(DISTINCT nomor_order) as totalOrder,sum(harga_order*qty) as total')->where('id_distributor',$dist->id_distributor)->where('nomor_order','LIKE',"%$today%")->where('status_order','Selesai')->first(); 
                                $totalc = $cari->total;
                                $totalDay = $cariDay->total;
                                ?>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($totalc)
                            <small>/total</small></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($totalDay)
                            <small>/hari ini</small></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </a>
        @endforeach
    </div>
    </div>
    <!-- /.container-fluid -->
    @endsection
