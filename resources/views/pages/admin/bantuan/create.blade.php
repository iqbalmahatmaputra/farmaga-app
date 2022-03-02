@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Permintaan Bantuan ke Cabang Lain</h1>
        <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-back fa-sm text-white-50"></i> Batal</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Permintaan</h6>
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
                        <form action="{{route('bantuan.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="jenis" value="Request" />
                            <input type="hidden" name="status" value="Belum" />
                            <input type="hidden" name="nama_peminta" value="{{Auth::user()->cabang}}" />
                            <input type="hidden" name="status" value="Belum" />
                            <div class="form-group">
                                <label for="product">Nama product</label>

                                <select class="form-control" name="nama_product">


                                    @forelse ($items as $item)
                                    <option value="{{$item->nama_product}}">{{$item->nama_product}}</option>
                                    @empty
                                    <option value="{{$item->nama_product}}">Belum ada nama</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control">
                            </div>
                          


                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 
    <div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div> -->
</div>

<!-- /.container-fluid -->
@endsection
