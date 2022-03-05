@extends('layouts.admin')

@section('content')
<style>
    th,td,tr{
        /* vertical-align: middle; */
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
        <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-back fa-sm text-white-50"></i> Kembali</a>

    </div>

    <div class="row">
    <div class="col-xl-12 col-md-12 col-xs-12 mb-4">
               <!-- Card -->
               <div class="card border-left-primary shadow h-100 py-2">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">List Order from {{$nomor}} Request</h6>
                </a>
                <div class="collapse show" id="collapseCardExample">
                    <div class="container mt-3">
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle">No</th>
                                        <th rowspan="2" class="align-middle">Product</th>
                                        <th rowspan="2" class="align-middle">Distributor</th>
                                        <th rowspan="2" class="align-middle">Jumlah</th>
                                        <th rowspan="2" class="align-middle">Harga</th>
                                        <th rowspan="2" class="align-middle">Status</th>
                                        <th colspan="3">Tanggal</th>
                                    </tr>
                                    <tr>
                                        <th>Order</th>
                                        <th>Kirim</th>
                                        <th>Terima</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyData">
                                    <?php $no = 1;
                                    $total = 0;?>
                                    @forelse ($items as $item)
                                    <?php
                                    if(Auth::user()->roles == 'USER'){
                                        $item->harga_order = 0;
                                    }
                                    $total += $item->harga_order * $item->qty; 
                                    ?>
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->nama_product}}</td>
                                        <td>{{$item->nama_distributor}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>@currency($item->harga_order)</td>
                                        <td>{{$item->status_order}}</td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->tanggal_kirim)->isoFormat('dddd, D MMMM Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->tanggal_terima)->isoFormat('dddd, D MMMM Y') }}</td>
                                    </tr>
                                        
                                    @empty
                                        <tr>
                                            <td colspan="8">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="8"><strong>Total Harga</strong></td>
                                        <td><strong>@currency($total)</strong></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End Card -->
        </div>
    
       
    </div>


</div>

<!-- /.container-fluid -->
@endsection
