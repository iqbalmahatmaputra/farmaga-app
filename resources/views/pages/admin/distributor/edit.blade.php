@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Distributor {{$item->nama_distributor}}</h1>
        <a href="{{route('distributor.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-back fa-sm text-white-50"></i> Batal</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Distributor</h6>
                </div>

            @if ($errors->any()) 
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                        
                    @endforeach
                </ul>
            </div>
                
            @endif


                <div class="card shadow">
                <div class="card-body">
                 <form action="{{route('distributor.update',$item->id_distributor)}}" method="post">
                     @method('PUT')
                     @csrf
                     <div class="form-group">
                         <label for="distributor">Nama Distributor</label>
                         <input type="text" name="nama_distributor" class="form-control" placeholder="Nama Distributor" value="{{$item->nama_distributor}}">
                     </div>
                     <div class="form-group">
                         <label for="distributor">Alamat Distributor</label>
                         <input type="text" name="alamat_distributor" class="form-control" placeholder="alamat Distributor" value="{{$item->alamat_distributor}}">
                     </div>
                     <div class="form-group">
                         <label for="distributor">No HP Distributor</label>
                         <input type="number" name="no_hp_distributor" class="form-control" placeholder="No Hp Distributor" value="{{$item->no_hp_distributor}}">
                     </div>
                     <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                 </form>
                 </div>
                </div>
            </div>
        </div>
    </div>


</div>


<!-- /.container-fluid -->
@endsection
