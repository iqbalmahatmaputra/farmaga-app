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
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nomor Order</th>
                                    <th>Jumlah Produk</th>
                                    <th>Total Pesanan</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php $no = 1; 
                                $pesanan = 0; $sumharga=0;?>
                             @foreach ($items as $item)
                             <?php $pesanan += $item->jumlah;
                             $sumharga += $item->total_harga;
                             ?>
                                 <tr>
                                     <td>{{$no++}}</td>
                                     <td>{{ $item->created_at }}</td>
                                     <td>{{ $item->nomor_order_stock}}</td>
                                     <td>{{ $item->jumlah_product}}</td>
                                     <td>{{ $item->jumlah}}</td>
                                     <td>@currency($item->total_harga)</td>
                                     @if ($item->status == 'Request')
                                         
                                     <td>{{ $item->status}}</td>
                                     @else
                                     <td>{{ $item->status}} - {{ $item->nomor_faktur_pbf}}</td>
                                         
                                     @endif
                                     <td>{{$item->jenis}}</td>
                                     <td class="d-flex justify-content-center"><?php $nomor = str_replace("/","-",$item->nomor_order_stock);?>    
                                        <a href="{{url('showDetail/'.$nomor)}}"
                                                title="Cek Detail" class="btn btn-info"> <span
                                                    class="icon text-white-50 ">
                                                    <i class="fas fa-eye"></i>
                                                </span></a>
                                                @if ($item->jenis == 'Belum' || $item->jenis == 'Kredit')
                                                <a href="{{url('showDetail/'.$nomor)}}"
                                                title="Pembayaran" class="btn btn-warning animate__animated animate__heartBeat animate__infinite"> <span
                                                    class="icon text-white-50 ">
                                                    <i class="fas fa-credit-card"></i>
                                                </span></a>
                                                @else
                                                    
                                                
                                                @endif
                                                @if ($item->status == 'Request')
                                                <a href="{{url('showDetailTransactional/'.$nomor)}}"
                                                title="Sudah Terima?" class="btn btn-warning animate__animated animate__heartBeat animate__infinite "> <span
                                                    class="icon text-white">
                                                    <i class="fas fa-shipping-fast"></i>
                                                </span></a>
                                                @else
                                                <a href="{{url('showDetailTransactional/'.$nomor)}}"
                                                title="Sudah Sampai" class="btn btn-success"> <span
                                                    class="icon text-white">
                                                    <i class="fas fa-shipping-fast"></i>
                                                </span></a>
                                                @endif
                                                
                                            </td>
                                 </tr>
                             @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nomor Order</th>
                                    <th>Jumlah Produk</th>
                                    <th>{{$pesanan}}</th>
                                    <th>@currency($sumharga)</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
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
        $('#dataTable').DataTable(
            {
                "order": [[ 1, "desc" ]]

            }
        );
    });

</script>
<!-- /.container-fluid -->
@endsection
