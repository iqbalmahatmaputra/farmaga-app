@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
        <!-- <a href="{{route('product.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a> -->
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Cabang</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Cabang</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                            
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->roles}}</td>
                                    <td>{{$item->cabang}}</td>
                                    @if ($item->status == 1 )
                                    <td>Aktif</td>
                                    @else
                                    <td>Non-Aktif</td>
                                    @endif
                                    
                                    <td>
                                        @if ($item->roles == "USER")
                                            
                                        <form action="{{route('user.update',$item->id)}}"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="roles"  value="GDG">
                                                <button class="btn btn-secondary mr-2" title="Gudang">
                                                    <i class="fas fa-fw fa-user"></i>
                                                </form>
                                        @else
                                        <form action="{{route('user.update',$item->id)}}"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="roles"  value="USER">
                                                <button class="btn btn-primary mr-2" title="Pegawai">
                                                    <i class="fas fa-fw fa-boxes"></i>
                                                </form>
                                        @endif
                                    @if ($item->status == 1 ) 
                                    <form action="{{route('user.update',$item->id)}}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status"  value="0">
                                            <button class="btn btn-success mr-2">
                                                <i class="fa fa-fw fa-toggle-on" title="De-Active"></i>
                                            </form>
                                            @else
                                            <form action="{{route('user.update',$item->id)}}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status"  value="1">
                                            <button class="btn btn-danger mr-2" title="Active">
                                                <i class="fa fa-fw fa-toggle-off"></i>
                                            </form>
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
