@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Order {{$nomor}}</h1>
        <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-back fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data {{$nomor}}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Distributor</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php $no =1;
                                $total_qty = 0;
                                $total_harga = 0;
                                ?>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{ucwords($item->nama_product)}}</td>
                                    <td>{{ucwords($item->nama_distributor)}}</td>
                                    <td>{{$item->qty_stock}}</td>
                                    <td>@currency($item->harga)</td>
                                    <!-- <td></td> -->
                                    <?php $total_qty += $item->qty_stock;
                                    $total_harga += $item->harga*$item->qty_stock;?>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">Total Harga</th>
                                   
                                    <!-- <th>{{$total_qty}}</th> -->
                                    <th>@currency($total_harga)</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </tfoot>
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
