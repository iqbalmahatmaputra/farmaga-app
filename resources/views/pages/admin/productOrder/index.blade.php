@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Order</h1>
    </div>
    <!-- Card Cabangs -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Order Product (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalOrder}} <small>order</small></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks ({{$totalSelesaiOrder}} selesai)</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ round(($totalPendingOrder-$totalSelesaiOrder)/$totalOrder*100 ,2)}}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ round(($totalPendingOrder-$totalSelesaiOrder)/$totalOrder*100 ,2)}}%"
                                            aria-valuenow="{{ round(($totalPendingOrder-$totalSelesaiOrder)/$totalOrder*100 ,2)}}" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalPendingOrder}} <small>order</small></div>
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
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
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
                        <table class="table table-bordered display-responsive" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <!-- <th>No</th> -->
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
                            <tfoot>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Tanggal Order</th>
                                    <th>Faktur Order</th>
                                    <th>Pro / Dist</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Cabang</th>
                                    <th>Status Order</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>

                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->nomor_order}}</td>
                                    <td>{{$item->nama_product}} / {{$item->nama_distributor}}</td>
                                    <td>@currency($item->harga_order)</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->cabang}}</td>
                                    @if ($item->status_order == 'Request')

                                    <td class="text-center"><span class="btn btn-warning">{{$item->status_order}}</span>
                                    </td>
                                    @elseif ($item->status_order == 'Proses')
                                    <td class="text-center"><span class="btn btn-primary">{{$item->status_order}}</span>
                                    </td>
                                    @elseif ($item->status_order == 'Selesai')
                                    <td class="text-center"><span class="btn btn-success">{{$item->status_order}}</span>
                                    </td>
                                    @else
                                    <td class="text-center"><span class="btn btn-danger">{{$item->status_order}}</span>
                                    </td>
                                    @endif
                                    <td>
                                        @if (Auth::user()->roles == "ADMIN" || Auth::user()->roles == "GDG")
                                            
                                        <a href="{{route('productOrder.edit',$item->id_product)}}" class="btn btn-info">Proses Order</a>
                                        @else
                                            
                                        <form action="{{route('productOrder.destroy',$item->id_product_order)}}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </form>
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
            "order": [[ 0, "desc" ]]
            //     "footerCallback": function ( row, data, start, end, display ) {
            //     var api = this.api();

            //     // Remove the formatting to get integer data for summation
            //     var intVal = function ( i ) {
            //         return typeof i === 'string' ?
            //             i.replace(/[\Rp,]/g, '')*1 :
            //             typeof i === 'number' ?
            //                 i : 0;
            //     };

            //     // Total over all pages
            //     total = api
            //         .column( 4 )
            //         .data()
            //         .reduce( function (a, b) {
            //             return intVal(a) + intVal(b);
            //         }, 0 );

            //     // Update footer
            //     $( api.column( 4 ).footer() ).html(
            //         'Rp. <span style="text-align: right;">'+ new Intl.NumberFormat(['ban', 'id']).format(total)+'</span>'
            //     );
            // }
        });
    });

</script>
<!-- /.container-fluid -->
@endsection
