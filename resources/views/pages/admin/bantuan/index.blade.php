@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bantuan</h1>
        <a href="{{route('bantuan.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Minta Bantuan</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Bantuan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Peminta</th>
                                    <th>Pemberi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php $no =1;?>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{ucwords($item->jenis)}}</td>
                                    <td>{{ucwords($item->nama_product)}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>{{ucwords($item->status)}}</td>
                                    <td>{{ucwords($item->nama_peminta)}}</td>
                                    <td>{{ucwords($item->nama_pemberi)}}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y') }} </td>
                                    <td>
                                        @if ($item->status != 'Selesai')
                                            
                                        <form action="{{route('bantuan.update',$item->id_request)}}"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-primary">
                                                    <i class="fa fa-fw fa-check"></i> </button>
                                                </form>
                                                @if ($item->nama_peminta == Auth::user()->cabang)
                                                    
                                                <form action="{{route('bantuan.destroy',$item->id_request)}}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                    </form>
                                                @endif
                                        @else
                                        {{ Carbon\Carbon::parse($item->replied_at)->isoFormat('dddd, D MMMM Y') }}
                                        @endif
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
