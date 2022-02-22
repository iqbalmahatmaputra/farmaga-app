@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title->nama_distributor}}</h1>
        <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-back fa-sm text-white-50"></i> Batal</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Order Stock ke {{$title->nama_distributor}}</h6>
                    <small>Produk akan tampil jika <b>Gudang</b> sudah memberikan harga</small>
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
                        <form action="{{ route('AddMoreStock') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                            @endif

                            <table class="table table-bordered" id="dynamicTable">
                                <tr>
                                    <th>Product</th>
                                    <th>Distributor</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                            <td>
                                <select class="form-control itemNameProduct" name="id_product[]"></select>
                                            </td>
                                       
                                                  
                                              <td>
                                  <select class="form-control" name="id_distributor[]">
                             @foreach ($items as $item)
                               <option value="{{$item->id_distributor}}">{{$item->nama_distributor}}</option>
                             @endforeach
                           </select>
                                              </td>
                                      
                                    <td><input type="number" name="qty_stock[]" placeholder="Masukkan Jumlah"
                                            class="form-control" /></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Tambah Item</button></td>
                                </tr>
                            </table>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
<script type="text/javascript">
   
    var i = 0;
   
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><select class="form-control itemNameProduct" name="id_product[]"></select></td> <td> <select class="form-control" name="id_distributor[]"> @foreach ($items as $item) <option value="{{$item->id_distributor}}">{{$item->nama_distributor}}</option> @endforeach </select> </td><td><input type="number" name="qty_stock[]" placeholder="Masukkan Jumlah" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Batalkan Item</button></td></tr>');
    
        $('.itemNameProduct').select2({
        placeholder: 'Pilih Produk',
        width: '100%',
        ajax: {
            url: "{{url('cariDataStock/'.$item->id_distributor)}}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nama,
                            id: item.id_product
                        }
                    })
                };
            },
            cache: true
        }
    });

    
      });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
        }
    });
    $('.itemNameProduct').select2({
        placeholder: 'Pilih Produk',
        width: '100%',
        ajax: {
            url: "{{url('cariDataStock/'.$item->id_distributor)}}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nama,
                            id: item.id_product
                        }
                    })
                };
            },
            cache: true
        }
    });
  
</script>

<!-- /.container-fluid -->
@endsection
