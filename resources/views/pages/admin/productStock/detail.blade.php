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
                                    <th>Aksi</th>
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
                                    <td>
                                        @if ($cekItems->jenis == 'Belum')
                                            
                                        <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal"
                                            data-target="#exampleModalCenterPayments">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-credit-card"></i>
                                            </span> <span class="text">Pembayaran</span>
                                        </button>
                                        @elseif ($cekItems->jenis == 'Cash')
                                        <button type="button" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-credit-card"></i>
                                            </span> <span class="text">Sudah Lunas</span>
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-info btn-icon-split"data-toggle="modal"
                                            data-target="#exampleModalCenterPaymentsPelunasan">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-credit-card"></i>
                                            </span> <span class="text">Kredit - {{date("Y-m-d", strtotime($cekItems->tanggal_pembayaran))}}</span>
                                        </button>
                                        @endif

                                    </td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenterPayments" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pembayaran {{$nomor}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php  
                $nomor_order_stock = str_replace("/","-",$nomor);
                ?>
                <form action="{{route('payment.update',$nomor_order_stock)}}" method="post">
                @method('PUT')

                    @csrf
                    <div class="form-group">
                        <label for="product">Nomor Order</label>
                        <input type="text" name="nomor_order_stock" class="form-control" placeholder="{{$nomor}}" readonly
                            value="{{$nomor}}">
                    </div>
                    <div class="form-group">
                        <label for="product">Pilih Metode Pembayaran</label>
                        <select class="form-control" name="jenis">
                            <option value="Cash">Cash</option>
                            <option value="Kredit">Kredit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product">Total Harga</label>
                        <input type="text" name="total_harga" class="form-control" placeholder="@currency($total_harga)" readonly
                            value="{{$total_harga}}">
                    </div>
                    <div class="form-group">
                        <label for="product">Tanggal Pembayaran</label>
                        <input type="date" name="tanggal_pembayaran" class="form-control" placeholder="" value="{{date('Y-m-d')}}">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Pelunasan Kredit-->
<div class="modal fade" id="exampleModalCenterPaymentsPelunasan" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pelunasan {{$nomor}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php  
                $nomor_order_stock = str_replace("/","-",$nomor);
                ?>
                <form action="{{route('payment.update',$nomor_order_stock)}}" method="post">
                @method('PUT')

                    @csrf
                    <div class="form-group">
                        <label for="product">Nomor Order</label>
                        <input type="text" name="nomor_order_stock" class="form-control" placeholder="{{$nomor}}" readonly
                            value="{{$nomor}}">
                    </div>
                    <div class="form-group">
                        <label for="product">Ingin Melunaskan?</label>
                        <select class="form-control" name="jenis">
                            <option value="Cash">Ya</option>
                            <option value="Kredit">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product">Total Harga</label>
                        <input type="text" name="total_harga" class="form-control" placeholder="@currency($total_harga)" readonly
                            value="{{$total_harga}}">
                    </div>
                    <div class="form-group">
                        <label for="product">Tanggal Pembayaran</label>
                        <input type="date" name="tanggal_pembayaran" class="form-control" placeholder="" value="{{date('Y-m-d')}}">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
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
