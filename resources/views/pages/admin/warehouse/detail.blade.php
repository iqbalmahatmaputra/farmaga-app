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
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nomor Order</th>
                                    <th>Jumlah Produk</th>
                                    <th>Total Pesanan</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nomor Order</th>
                                    <th>Jumlah Produk</th>
                                    <th>Total Pesanan</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                             @foreach ($items as $item)
                                 <tr>
                                     <td>{{$no++}}</td>
                                     <td>{{ $item->created_at }}</td>
                                     <td>{{ $item->nomor_order_stock}}</td>
                                     <td>{{ $item->jumlah_product}}</td>
                                     <td>{{ $item->jumlah}}</td>
                                     <td>@currency($item->total_harga)</td>
                                     <td>{{ $item->status}}</td>
                                     <td class="d-flex justify-content-center"><?php $nomor = str_replace("/","-",$item->nomor_order_stock);?>    
                                        <a href="{{url('showDetail/'.$nomor)}}"
                                                title="Cek Detail" class="btn btn-info"> <span
                                                    class="icon text-white-50 ">
                                                    <i class="fas fa-eye"></i>
                                                </span></a>
                                                <a href="{{url('showDetail/'.$nomor)}}"
                                                title="Pembayaran" class="btn btn-warning"> <span
                                                    class="icon text-white-50 ">
                                                    <i class="fas fa-credit-card"></i>
                                                </span></a>
                                            </td>
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
        $('#dataTable').DataTable(
            {
                "order": [[ 1, "desc" ]]

            }
        );
    });

</script>
<!-- /.container-fluid -->
@endsection
