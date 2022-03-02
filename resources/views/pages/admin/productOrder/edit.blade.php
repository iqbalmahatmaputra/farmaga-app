@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
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


            @foreach ($items as $item)
                <div class="card shadow">
                <div class="card-body">
                        
                    <form action="{{route('updateOrder',$item->id_product_order)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="product">Nama Product - Distributor</label>
                            <input type="text" name="nama_product" class="form-control" placeholder="Nama Product" value="{{$item->nama_product}} - {{$item->nama_distributor}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="product">Jumlah </label>
                            <input type="text" name="qty" class="form-control" placeholder="Nama Product" value="{{$item->qty}}">
                        </div>
                       
                      
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>


</div>


<!-- /.container-fluid -->
@endsection
