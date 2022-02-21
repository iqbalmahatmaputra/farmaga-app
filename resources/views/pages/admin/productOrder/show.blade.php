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
        </div>
    </div>


</div>

<script type="text/javascript">
   $(document).ready(function() {
        // Ajax Show Request by Nomor Order
        $.ajax({
            url:  "{{url('getOrderData/'.$id)}}",
            type: "get",
            data:{ 
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = '';
                var i=1;
                $.each(resultData,function(index,row){
                    
                    bodyData+="<tr>"
                    bodyData+="<td>"+ i++ +"</td><td>"+row.nama_product+"</td><td>"+row.nama_distributor+"</td><td>"+row.qty+"</td>"
                    +"<td>"+row.harga_order+"</td><td><a class='btn btn-primary' href='#'>Edit</a>" 
                    +"<button class='btn btn-danger delete' value='"+row.id+"' style='margin-left:20px;'>Delete</button></td>";
                    bodyData+="</tr>";
                    
                })
                $("#bodyData").append(bodyData);
            }
        });
    });
</script>
<!-- /.container-fluid -->
@endsection
