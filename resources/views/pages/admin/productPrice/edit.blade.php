@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Harga Produk {{$product_items[0]->nama_product}}</h1>
        <a href="{{route('productPrice.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-back fa-sm text-white-50"></i> Batal</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Produk Harga</h6>
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
                 <form action="{{route('productPrice.update',$items->id_product_price)}}" method="post">
                     @method('PUT')
                     @csrf
                     <div class="form-group">
                         <label for="product">Produk</label>
                         <select class="form-control" name="id_product" readonly>
                             
                              <option name="id_product" class="form-control" value="{{$items->id_product}}">{{$product_items[0]->nama_product}}</option>
                              <!--
                             @forelse ($prod_items as $product_item)
                             <option name="id_product" class="form-control" value="{{$pilihs->id_product}}">{{$product_item->nama_product}}</option>
                             
                             @empty
                             <option name="id_product" class="form-control" value="Kosong">Data Kosong</option>
                             @endforelse -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product">Distributor</label>
                            <select class="form-control" name="id_distributor" readonly>
                            <option name="id_distributor" class="form-control" value="{{$items->id_distributor}}">{{$product_items[0]->nama_distributor}}</option>
                                <!-- @forelse ($dist_items as $item)
                                <option name="id_distributor" class="form-control" value="{{$pilihs->id_distributor}}">{{$item->nama_distributor}}</option>
                                
                                @empty
                                <option name="id_distributor" class="form-control" value="Kosong">Data Kosong</option>
                                @endforelse -->
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="product">Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga product" value="{{$items->harga}}">
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
