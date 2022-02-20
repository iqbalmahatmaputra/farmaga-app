@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data {{$item->nama_cabang}}</h1>
        <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-back fa-sm text-white-50"></i> Batal</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Cabang</h6>
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
                 <form action="{{route('cabang.update',$item->id_cabang)}}" method="post">
                     @method('PUT')
                     @csrf
                     <div class="form-group">
                         <label for="product">Nama Cabang</label>
                         <input type="text" name="nama_cabang" class="form-control" placeholder="Nama cabang" value="{{$item->nama_cabang}}">
                     </div>
                     <div class="form-group">
                         <label for="lokasi">Lokasi</label>
                         <input type="text" name="lokasi" class="form-control" placeholder="" value="{{$item->lokasi}}">
                     </div>
                     <div class="form-group">
                         <label for="limit_perhari">Limit Harian</label>
                         <input type="text" name="limit_perhari" class="form-control" placeholder="" value="{{$item->limit_perhari}}">
                     </div>
                     <div class="form-group">
                         <label for="limit_perbulan">Limit Bulanan</label>
                         <input type="text" name="limit_perbulan" class="form-control" placeholder="" value="{{$item->limit_perbulan}}">
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
