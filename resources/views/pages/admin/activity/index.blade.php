@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Activity Logs</h1>
        
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data aktifitas akun</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Deskripsi</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1;?>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{ucwords($item->action)}}</td>
                                    <td>{{ucwords($item->description)}}</td>
                                    <td>{{ucwords($item->nama_user)}}</td>
                                    

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center"></td>
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
