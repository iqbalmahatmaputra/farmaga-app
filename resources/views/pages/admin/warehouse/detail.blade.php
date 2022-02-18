@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Distributor {{$nama->nama_distributor}}</h1>
       
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
                    <a href="{{url('/detailOrder',$nama->id_distributor)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Order ke PFB</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Cabang</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Nomor Order</th>
                                    <th>Status</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Cabang</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Nomor Order</th>
                                    <th>Status</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </tfoot>
                            <tbody>
                             @foreach ($items as $item)
                                 <tr>
                                     <td>{{ $item->cabang}}</td>
                                     <td>{{ $item->nama_product}}</td>
                                     <td>{{ $item->qty}}</td>
                                     <td>{{ $item->nomor_order}}</td>
                                     <td>{{ $item->status_order}}</td>
                                     <!-- <td></td> -->
                                 </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

</script>
<!-- /.container-fluid -->
@endsection
