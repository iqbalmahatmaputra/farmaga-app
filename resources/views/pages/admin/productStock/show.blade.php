@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
        <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-back fa-sm text-white-50"></i> Kembali</a>

    </div>

    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="d-flex flex-column ">
                <!-- Collapsable Card Example -->
                <div class="card border-left-dark shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#PBF" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="PBF">
                        <h6 class="m-0 font-weight-bold text-primary">Data per PBF</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="PBF">
                        <div class="card-body">
                            <p class="m-2">Ini adalah jumlah stok saat ini pada setiap <strong>PBF</strong>.</p>
                            <table class="table table-bordered display-responsive">
                                <thead>
                                    <tr>
                                        <th>Distributor</th>
                                        <th>Jumlah</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0;?>
                                    @forelse ($pbf_items as $item)

                                    <tr>
                                        <td>{{$item->nama_distributor}}</td>
                                        <td>{{$item->jumlahStok}}</td>
                                        <?php $total += $item->jumlahStok;?>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2">Data Kosong</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><strong>Total</strong></th>
                                        <th><strong>{{$total}}</strong></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card border-left-dark shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#CBG" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="CBG">
                        <h6 class="m-0 font-weight-bold text-primary">Harga per PBF</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="CBG">
                        <div class="card-body">
                            <p class="m-2">Ini adalah harga saat ini pada setiap <strong>PBF</strong>.</p>
                            <table class="table table-bordered display-responsive">
                                <thead>
                                    <tr>
                                        <th>Distributor</th>
                                        <th>Jumlah</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($harga_items as $item)

                                    <tr>
                                        <td>{{$item->nama_distributor}}</td>
                                        <td>@currency($item->harga_order)</td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2">Data Kosong</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
        <div class="d-flex flex-column ">
                <!-- Collapsable Card Example -->
               
                <div class="card border-left-dark shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#PBF" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="PBF">
                        <h6 class="m-0 font-weight-bold text-primary">Order per Cabang</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="PBF">
                        <div class="card-body">
                            <p class="m-2">Ini adalah orderan saat ini pada setiap <strong>Cabang</strong>.</p>
                            <table class="table table-bordered display-responsive">
                                <thead>
                                    <tr>
                                        <th>Cabang</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>

                                    </tr>
                                </thead>
                                <tbody>
<?php $total_harga = 0; $total_item = 0; ?>
                                    @forelse ($order_items as $item)

                                    <tr>
                                        <td>{{$item->cabang}}</td>
                                        <td>{{$item->jumlah_order}}</td>
                                        <td>@currency($item->total)</td>
<?php $total_harga += $item->total; 
        $total_item += $item->jumlah_order;?>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2">Data Kosong</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><strong>Total</strong></th>
                                        <th><strong>{{$total_item}}</strong></th>
                                        <th><strong>@currency($total_harga)</strong></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card border-left-dark shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#CBG" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="CBG">
                        <h6 class="m-0 font-weight-bold text-primary">Data per PBF</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="CBG">
                        <div class="card-body">
                            <p class="m-2">Ini adalah jumlah stok saat ini pada setiap <strong>PBF</strong>.</p>
                            <table class="table table-bordered display-responsive">
                                <thead>
                                    <tr>
                                        <th>Distributor</th>
                                        <th>Jumlah</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0;?>
                                    @forelse ($pbf_items as $item)

                                    <tr>
                                        <td>{{$item->nama_distributor}}</td>
                                        <td>{{$item->jumlahStok}}</td>
                                        <?php $total += $item->jumlahStok;?>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2">Data Kosong</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><strong>Total</strong></th>
                                        <th><strong>{{$total}}</strong></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">History Product</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered display-responsive">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Distributor</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @forelse ($items as $item)
    
                                <tr>
                                    <th>{{$item->created_at}}</th>
                                    <th>{{$item->qty_stock}}</th>
                                    <th>{{$item->nama_distributor}}</th>
                                </tr>
                                @empty
                                <tr>
    
                                    <th colspan="2">Data Kosong</th>
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

<script type="text/javascript">
    // $(document).ready(function () {
    //     $('#dataTable').DataTable();
    // });

</script>
<!-- /.container-fluid -->
@endsection
