@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Product Harga</h1>
        <a href="{{route('productPrice.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-back fa-sm text-white-50"></i> Batal</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Product Harga</h6>
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
                 <form action="{{route('productPrice.store')}}" method="post">
                     @csrf
                     <div class="form-group">
                         <label for="product">Produk</label>
                         <select class="form-control" name="id_product">
                             <option>Pilih Produk</option>
                             @forelse ($product_items as $product_item)
                             <option name="id_product" class="form-control" value="{{$product_item->id_product}}">{{$product_item->nama_product}}</option>
                             
                             @empty
                             <option name="id_product" class="form-control" value="Kosong">Data Kosong</option>
                             @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product">Distributor</label>
                            <select class="form-control" name="id_distributor">
                                <option>Pilih Distributor</option>
                                @forelse ($items as $item)
                                <option name="id_distributor" class="form-control" value="{{$item->id_distributor}}">{{$item->nama_distributor}}</option>
                                
                                @empty
                                <option name="id_distributor" class="form-control" value="Kosong">Data Kosong</option>
                                @endforelse
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="product">Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga product" value="{{old('harga')}}">
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
