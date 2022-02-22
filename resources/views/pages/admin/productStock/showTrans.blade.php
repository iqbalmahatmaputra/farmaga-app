@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
        <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-back fa-sm text-white-50"></i> Kembali</a>

    </div>

    <div class="row">
    <div class="col-xl-6 col-md-6 col-xs-12 mb-4">
               <!-- Card -->
               <div class="card border-left-primary shadow h-100 py-2">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">List Order Stock Request</h6>
                </a>
                <div class="collapse show" id="collapseCardExample">
                    <div class="container mt-3">
                        <p>Silahkan tekan tombol Proses untuk memproses orderan Stock</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>Distributor</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyData">
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End Card -->
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 col-xs-12 mb-4">



            <!-- Card -->
            <div class="card border-left-success shadow h-100 py-2">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-success">List Order Barang yang sudah sampai</h6>
                </a>
                <div class="container mt-3">
                <?php  
                $nomor_order_stock = str_replace("/","-",$nomor);
                ?>
                <form action="{{route('productStock.update',$nomor_order_stock)}}" method="post">
                     @method('PUT')
                     @csrf
                     <div class="row">
                         <div class="col-6">

                             <div class="form-group">
                                    
                                     <input type="text" name="nomor_faktur_pbf" class="form-control" required placeholder="Input Nomor Faktur dari {{$items1->nama_distributor}}" 
                                         value="{{$items1->nomor_faktur_pbf}}">
                                 </div>
                         </div>
                         <div class="col-6">
                             <button type="submit" class="btn btn-primary">Simpan</button>

                         </div>
                     </div>
</form>
                    
                    </div>
                <div class="collapse show" id="collapseCardExample">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>Distributor</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyData2">
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->



        </div>
       
    </div>


</div>

<script type="text/javascript">
    $(document).ready(function () {

        loadDataRequest();
        loadDataProses();
        //    Button Proses 
        $(document).on("click", ".proses", function () {
            var $ele = $(this).parent().parent();
            var id = $(this).val();
            var url = "{{url('updateToTransArrive')}}";
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
            loadDataProses();

        });
        // End Button Proses
        // Button Batalkan
        $(document).on("click", ".batal", function () {
            var $ele = $(this).parent().parent();
            var id = $(this).val();
            var url = "{{url('updateToTransRequest')}}";
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
            loadDataProses();

        });
        // End Button Batal
        // Ajax Show Request by Nomor Order
        function loadDataRequest() {

            $.ajax({
                url: "{{url('getTransRequest/'.$id)}}",
                type: "get",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    var i = 1;
                    $.each(resultData, function (index, row) {

                        bodyData += "<tr>"
                        bodyData += "<td>" + i++ + "</td><td>" + row.nama_product +
                            "</td><td>" + row.nama_distributor + "</td><td>" + row.qty_stock +
                            "</td>" +
                            "<td>" + row.harga +
                            "</td><td><button class='btn btn-primary proses' value='" + row
                            .id_product_stock + "'>Proses</button>" +
                            "</td>";
                        bodyData += "</tr>";

                    })
                    if (bodyData) {
                        $("#bodyData").empty();

                        $("#bodyData").append(bodyData);
                    } else {
                        $("#bodyData").append(bodyData);
                    }
                }
            });
        }


        function loadDataProses() {

            $.ajax({
                url: "{{url('getTransArrive/'.$id)}}",
                type: "get",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData2 = '';
                    var i = 1;
                    $.each(resultData, function (index, row) {

                        bodyData2 += "<tr>"
                        bodyData2 += "<td>" + i++ + "</td><td>" + row.nama_product +
                            "</td><td>" + row.nama_distributor + "</td><td>" + row.qty_stock +
                            "</td>" +
                            "<td>" + row.harga +
                            "</td><td><button class='btn btn-warning batal' value='" + row
                            .id_product_stock + "'>Batal</button>" +
                            "</td>";
                        bodyData2 += "</tr>";

                    })
                    if (bodyData2) {
                        $("#bodyData2").empty();
                        $("#bodyData2").append(bodyData2);
                    } else {
                        $("#bodyData2").append(bodyData2);
                    }
                }
            });
        }
    });

</script>
<!-- /.container-fluid -->
@endsection
