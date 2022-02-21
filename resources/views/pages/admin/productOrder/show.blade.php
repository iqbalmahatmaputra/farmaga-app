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

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">

            <div class="d-flex justify-content-around">
                <!-- Card -->
                <div class="card border-left-primary shadow h-100 py-2">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Order Per Item</h6>
                </a>
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
                                <tbody id="bodyData">
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End Card -->
                    <!-- Card -->
                    <div class="card border-left-primary shadow h-100 py-2">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Order Per Item</h6>
                </a>
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


</div>

<script type="text/javascript">
   
    $(document).ready(function () {
   
        loadDataRequest();
        loadDataProses();
//    Button Proses 
$(document).on("click", ".proses", function() { 
        var $ele = $(this).parent().parent();
        var id= $(this).val();
        var url = "{{url('updateToProses')}}";
        var uurl = url+"/"+id;
     
		$.ajax({
			url: uurl,
			type: "GET",
			cache: false,
			data:{
				_token:'{{ csrf_token() }}'
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$ele.fadeOut().remove();
				}
			}
		});
        loadDataRequest();
        loadDataProses();
        
    });
// End Button Proses
// Button Batalkan
$(document).on("click", ".batal", function() { 
        var $ele = $(this).parent().parent();
        var id= $(this).val();
        var url = "{{url('updateToProsesBatal')}}";
        var uurl = url+"/"+id;
     
		$.ajax({
			url: uurl,
			type: "GET",
			cache: false,
			data:{
				_token:'{{ csrf_token() }}'
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$ele.fadeOut().remove();
				}
			}
		});
        loadDataRequest();
        loadDataProses();
        
    });
// End Button Batal
        // Ajax Show Request by Nomor Order
    function loadDataRequest(){

        $.ajax({
        url: "{{url('getOrderData/'.$id)}}",
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
                    "</td><td>" + row.nama_distributor + "</td><td>" + row.qty +
                    "</td>" +
                    "<td>" + row.harga_order +
                    "</td><td><button class='btn btn-primary proses' value='" + row.id_product_order +"'>Proses</button>" +
                    "</td>";
                bodyData += "</tr>";

            })
            if(bodyData){
                $("#bodyData").empty();
                
                $("#bodyData").append(bodyData);
            }else{
                $("#bodyData").append(bodyData);
            }
        }
    });
    }
    
     
function loadDataProses(){

    $.ajax({
        url: "{{url('getOrderDataProses/'.$id)}}",
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
                "</td><td>" + row.nama_distributor + "</td><td>" + row.qty +
                    "</td>" +
                    "<td>" + row.harga_order +
                    "</td><td><button class='btn btn-warning batal' value='" + row.id_product_order +"'>Batal</button>" +
                    "</td>";
                bodyData2 += "</tr>";

            })
            if(bodyData2){
                $("#bodyData2").empty();
                $("#bodyData2").append(bodyData2);
            }else{
                $("#bodyData2").append(bodyData2);
            }
        }
    });
}
    });

</script>
<!-- /.container-fluid -->
@endsection
