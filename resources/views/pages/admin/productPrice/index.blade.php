@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
        <a href="{{route('productPrice.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Harga Product</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Nama Produk</th>
                                    <th>Distributor</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Nama Produk</th>
                                    <th>Distributor</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                            
                                    <td>{{$item->nama_product}}</td>
                                    <td>{{$item->nama_distributor}}</td>
                                    <td>@currency($item->harga)</td>
                                    <td>
                                    <a href="{{route('productPrice.edit',$item->id_product_price)}}" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                        <form action="{{route('productPrice.destroy',$item->id_product_price)}}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </form>
                                    </td>

                                    </button>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center"></td>
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
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

</script>
<!-- /.container-fluid -->
@endsection
