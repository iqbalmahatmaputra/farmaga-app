@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Product {{$item->nama_product}}</h1>
        <a href="{{route('product.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-back fa-sm text-white-50"></i> Batal</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
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
                 <form action="{{route('product.update',$item->id_product)}}" method="post">
                     @method('PUT')
                     @csrf
                     <div class="form-group">
                         <label for="product">Nama Product</label>
                         <input type="text" name="nama_product" class="form-control" placeholder="Nama Product" value="{{$item->nama_product}}">
                     </div>
                     <div class="form-group">
                         <label for="product">Satuan Product</label>
                         <input type="text" name="satuan_product" class="form-control" placeholder="satuan Product" value="{{$item->satuan_product}}">
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
