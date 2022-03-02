@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Hutang</h1>
        <!-- <a href="{{route('product.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a> -->
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nomor Order</th>
                                    <th>Total Hutang</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th width="150px">Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $no =1;
                                $total =0; ?>
                                @forelse ($hutang_items as $item)
                                <?php $total += $item->total_harga; ?>
                                <tr class="text-center">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nomor_order_stock}}</td>
                                    <td>@currency($item->total_harga)</td>
                                    <td>{{ Carbon\Carbon::parse($item->tanggal_pembayaran)->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td class="d-flex justify-content-around">
                                    <?php $nomor = str_replace("/","-",$item->nomor_order_stock);?> 
                                <a href="{{url('showDetail/'.$nomor)}}"
                                                title="Pembayaran" class="btn btn-warning animate__animated animate__heartBeat animate__infinite"> <span
                                                    class="icon text-white-50 ">
                                                    <i class="fas fa-credit-card"></i>
                                                </span></a>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada Hutang</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    
                                    <th colspan="2">Total Hutang</th>
                                    <th>@currency($total)</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Aksi</th>
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
