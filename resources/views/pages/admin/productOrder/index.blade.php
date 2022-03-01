@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Order</h1>
        @if (Auth::user()->roles == "USER" )
            
        <a href="{{route('productOrder.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
        @endif

    </div>
    <!-- Card Cabangs -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Order Product (Total)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalOrder}} <small>order</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @if ($totalOrder > 0)
        <?php  $totalOrder = $totalOrder;?>
        @else
        <?php $totalOrder = 1; ?>
        @endif
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                ({{$totalSelesaiOrder}} selesai)</div>
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
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalPendingOrder}}
                                <small>order</small></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Card Cabangs -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Order Per Item</h6>
                </a>
                <div class="collapse show" id="collapseCardExample">
                    <!-- <div class="card-header py-3 d-sm-flex align-items-center justify-content-between "> -->
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Data Order</h6> -->
                    <!-- <a href="{{route('productOrder.create')}}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a> -->
                    <!-- </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display-responsive text-center" id="dataTable"
                                width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Order</th>
                                        <th>Faktur Order</th>
                                        <th>Pro / Dist</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Cabang</th>
                                        <th>Status Order</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no =1; $total=0; $total_harga=0;?>
                                    @forelse ($items as $item)
                                    <?php $total += $item->qty; $total_harga += $item->harga_order;?>
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y') }}</td>
                                        <td>{{$item->nomor_order}}</td>

                                        @if (Auth::user()->roles == "USER" )
                                        <td>{{$item->nama_product}} / {{$item->nama_distributor}}</td>
                                        <td>Tidak dapat dilihat</td>
                                        @else
                                        <td>
                                            <?php $nomor = str_replace("/","-",$item->nomor_order);?>
                                            <a href="{{route('productOrder.show',$nomor)}}" title="Cek Detail"
                                                class="btn btn-info"> <span class="icon text-white-50">
                                                    <i class="fas fa-eye"></i>
                                                </span></a></td>
                                        <!-- cek limit -->
                                        @if ($item->harga_order <= $item->limit_perhari)

                                            <td>@currency($item->harga_order)</td>
                                            @else
                                            <td><span class="btn btn-warning">@currency($item->harga_order)</span></td>

                                            @endif

                                            @endif
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->cabang}}</td>
                                            @if ($item->status_order == 'Request')

                                            <td class="text-center"><span
                                                    class="btn btn-warning">{{$item->status_order}}</span>
                                            </td>
                                            @elseif ($item->status_order == 'Kirim')
                                            @if (Auth::user()->roles == "USER")
                                            <td class="text-center"><?php $nomor = str_replace("/","-",$item->nomor_order);?>
                                                <a href="{{url('/showArriveList',$nomor)}}" title="Confirmation"
                                                    class="btn btn-info animate__animated animate__heartBeat animate__infinite"> <span class="icon text-white">
                                                        <i class="fas fa-shipping-fast"></i> <span
                                                            class="text-white">Confirmation</span>
                                                    </span></a>
                                            </td>
                                            @else
                                            <td class="text-center"><?php $nomor = str_replace("/","-",$item->nomor_order);?>
                                                <a href="#" title="Confirmation"
                                                    class="btn btn-info"> <span class="icon text-white">
                                                        <i class="fas fa-shipping-fast"></i> <span
                                                            class="text-white">Waiting</span>
                                                    </span></a>
                                            </td>
                                            @endif
                                            
                                            @elseif ($item->status_order == 'Selesai')
                                            @if (Auth::user()->roles == "ADMIN" || Auth::user()->roles == "GDG")
                                                
                                            <td class="text-center"><span
                                                    class="btn btn-success">{{$item->status_order}}</span>
                                            </td>
                                            @else
                                            <td class="text-center"><span
                                                    class="btn btn-success">{{date("Y-m-d", strtotime($item->tanggal_terima))}}</span>
                                            </td>
                                            @endif
                                            @else
                                            <td class="text-center"><span
                                                    class="btn btn-danger">{{$item->status_order}}</span>
                                            </td>
                                            @endif
                                            <td>
                                                @if (Auth::user()->roles == "ADMIN" || Auth::user()->roles == "GDG")
                                                @if ($item->status_order == 'Request')

                                                <?php $nomor = str_replace("/","-",$item->nomor_order);?>
                                                <a href="{{route('productOrder.show',$nomor)}}" title="Kirim? Klik saja"
                                                    class="btn btn-warning animate__animated animate__heartBeat animate__infinite ">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-shipping-fast"></i>
                                                    </span></a>
                                                @else
                                                <?php $nomor = str_replace("/","-",$item->nomor_order);?>
                                                <a href="{{route('productOrder.show',$nomor)}}" title="Cek Detail"
                                                    class="btn btn-info"> <span class="icon text-white">
                                                        <i class="fas fa-eye"></i> <span
                                                            class="text-white">Detail</span>
                                                    </span></a>
                                                @endif

                                                @else

                                                <!-- If jika waiting -->
                                                @if ($item->status_order == 'Keranjang')
                                                <form action="{{route('productOrder.destroy',$item->id_product_order)}}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" title="Delete Data">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                </form>

                                                @else
                                                <a href="#" class="btn btn-info sabar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                </a>

                                                @endif

                                                @endif
                                            </td>

                                            </button>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Order</th>
                                        <th>Faktur Order</th>
                                        <th>Pro / Dist</th>
                                        <th>@currency($total_harga)</th>
                                        <th>{{$total}}</th>
                                        <th>Cabang</th>
                                        <th>Status Order</th>
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


</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable({
            // "order": [[ 0, "desc" ]]

        });

        $('.sabar').on("click", function () {
            Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Barang kamu sedang di proses!',
//   footer: '<a href="">Why do I have this issue?</a>'
})
        })
    });

</script>
<!-- /.container-fluid -->
@endsection
