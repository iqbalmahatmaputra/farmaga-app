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
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Produk yang di Order Cabang</h6>
                    <small>Produk akan tampil jika <b>Gudang</b> sudah memberikan harga</small>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Produk</td>
                                        <td>Jumlah</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; 
                                    foreach ($data as $data) {
                                    ?>
                                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                    <input type="hidden" id="id_product{{$no}}" name="id_product" value="{{$data->id_product}}" />
                                    <input type="hidden" id="id_distributor{{$no}}"  name="id_distributor" value="{{$data->id_distributor}}" />
                                    <input type="hidden" id="harga{{$no}}"  name="harga" value="{{$data->harga_order}}" />
                                    <input type="hidden" id="nomor_order_stock{{$no}}"  name="nomor_order_stock" value="{{$nomor_order_stock}}" />
                                    <input type="hidden" id="status{{$no}}"  name="status" value="Request" />
                                        <tr>
                                            <td class="align-middle">{{$no}}</td>
                                            <td class="align-middle">{{$data->nama_product}}</td>
                                            <td class="align-middle"><input type="number" class="form-control text-center"
                                                    name="qty_stock" id="qty_stock{{$no}}" value="{{$data->total}}" /></td>
                                            <td class="align-middle">
                                                <button type="submit" onclick="myFunction({{$no}})" class="btn btn-primary">Pilih</button>
                                            </td>
                                        </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="5" class="align-middle text-center">Tidak ada Order</td>
                                    </tr> 
                                   
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Data Order Stock ke {{$nomor_order_stock}}</h6>
                    <small>Produk akan tampil jika <b>Gudang</b> sudah memberikan harga</small>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Produk</td>
                                        <td>Jumlah</td>
                                        <td>Total Harga</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody id="bodyData">

                                </tbody>
                            </table>
                        </div>
                        <?php $nomor = str_replace("/","-",$nomor_order_stock); ?>
                        <a href="{{url('showDetail/'.$nomor)}}" class="btn btn-primary float-right mr-3 text-white"><span class="icon text-white">
                                                        <i class="fas fa-shipping-fast"></i>
                                                    </span>Pesan Sekarang</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        loadDataRequest();
        
    });

    // Jika klik tambahStock
    function myFunction(id) {
        
      var id_product = $('#id_product'+id).val();
      var id_distributor = $('#id_distributor'+id).val();
      var harga = $('#harga'+id).val();
      var nomor_order_stock = $('#nomor_order_stock'+id).val();
      var status = $('#status'+id).val();
      var qty_stock = $('#qty_stock'+id).val();
          $.ajax({
              url: "{{route('productStock.store')}}",
              type: "POST",
              data: {
                  _token: $("#csrf").val(),
              
                  id_product:id_product,
                  id_distributor: id_distributor,
                  harga: harga,
                  nomor_order_stock: nomor_order_stock,
                  status: status,
                  qty_stock: qty_stock
              },
              cache: false,
              success: function(dataResult){
                  var dataResult = JSON.parse(dataResult);
                  if(dataResult.statusCode==200){
                    
                  			
                  }
                  else if(dataResult.statusCode==201){
                     alert("Terjadi kesalahan!");
                  }
                  
              }

          });
          loadDataRequest();

  }
    // End
    // Button Batalkan
    $(document).on("click", ".batal", function () {
            var $ele = $(this).parent().parent();
            var id = $(this).val();
            var url = "{{url('batalOrderStock')}}";
            var uurl = url + "/" + id;

            $.ajax({
                url: uurl,
                type: "GET",
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $ele.fadeOut().remove();
                    }
                }
            });
            loadDataRequest();

        });
        // End Button Batal
    function loadDataRequest() {
            $.ajax({
                <?php $nomor = str_replace("/","-",$nomor_order_stock); ?>
                url: "{{url('getProductList/'.$nomor)}}",
                type: "get",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    // console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    var i = 1;
                    var hartol = 0;
                    $.each(resultData, function (index, row) {

                        bodyData += "<tr>"
                        bodyData += "<td>" + i++ + "</td><td>" + row.nama_product +
                            "</td><td>" + row.qty_stock + "</td><td>"+rupiah(row.qty_stock*row.harga)+"</td>" +
                            "<td><button class='btn btn-warning batal' value='" + row
                            .id_product_stock + "'>Batal</button>" +
                            "</td>";
                        bodyData += "</tr>";
                        hartol += row.qty_stock*row.harga;
                    })
                    bodyData += "<tr><td colspan='3'>Total Harga</td><td colspan='2'>"+rupiah(hartol)+"</td></tr>"
                    if (bodyData) {
                        $("#bodyData").empty();

                        $("#bodyData").append(bodyData);
                    } else {
                        $("#bodyData").append(bodyData);
                    }
                }
            });
        }

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });
    const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
  }

</script>

<!-- /.container-fluid -->
@endsection
