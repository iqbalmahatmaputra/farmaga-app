<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="min-width: 800px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Order <b>Harian</b> {{ Auth::user()->cabang }}</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-resposive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Order</th>
                    <th>Produk-Distributor</th>
                    <th>Jumlah</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
        $today = date('Y.m.d');
        $nomor_order = sprintf("%03s", abs(Auth::user()->id_cabang))."/".Auth::user()->cabang."/".$today;

                $items = DB::table('v_order_products_user')->where('nomor_order',$nomor_order)->orderBy('nama_distributor')->get();
                ?>
                @forelse ($items as $item)
                <tr>
                    <td><?= $no++; ?></td>
                    <td>{{$item->nomor_order}}</td>
                    <td>{{$item->nama_product}} - {{$item->nama_distributor}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->name_user}}</td>
                    <td>
                    <form action="{{route('productOrder.destroy',$item->id_product_order)}}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center"> Belum Ada Data</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary text-white">Check Out</a>
      </div>
    </div>
  </div>
</div>