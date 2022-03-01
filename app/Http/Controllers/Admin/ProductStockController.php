<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\ProductStock;
use Alert;
use Redirect;
class ProductStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('v_stock_products')->selectRaw('sum(qty_stock) as jumlahStok,id_product,id_distributor, nama_product,nama_distributor')->groupBy('nama_product')->get();
      
        return view('pages.admin.productStock.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = DB::table('v_order_products_user')->select('nama_distributor')->where('id_distributor',$id)->first();
        $items = DB::table('distributors')
        ->select('*')->get();
        return view('pages.admin.productStock.create',[
            'items' => $items,
            'title' => $title

        ]);
    }
    public function detailOrder($id)
    {
        $title = DB::table('v_order_products_user')->select('nama_distributor','id_distributor')->where('id_distributor',$id)->first();
        $items = DB::table('distributors')
        ->select('*')->where('id_distributor',$id)->get();
        $nama_distributor = $title->nama_distributor;
        Alert::info('Perhatian', 'Harap tambahkan harga terlebih dahulu agar produk tampil sesuai distributor '.$nama_distributor.'');

        return view('pages.admin.productStock.create',[
            'items' => $items,
            'title' => $title

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function AddMoreStock(Request $request){
        $today = date('Y.m.d');
        $hariOrder = date('Y-m-d');
        $satu = 1;
        $nomorUrut = \DB::table('product_stocks')->where('nomor_order_stock','LIKE',"%$today%")->distinct()->count('nomor_order_stock');
        $nomoor = \DB::table('product_stocks')->orderby('created_at','desc')->first();
        $order = $nomoor->nomor_order_stock;
        $urut= substr($order,2,1);
        $nomor_order_stock = sprintf("%03s", abs($urut + $satu))."/"."GDG"."/".$today;
        // var_dump($nomor_order_stock);
        // die;
        $data = array();

        $hitung = count($request->id_product);
        
            for($i=0;$i<$hitung;$i++)
            {   
                $harga = DB::table('products_price')->select('harga')->where('id_distributor',$request->id_distributor[$i])->where('id_product',$request->id_product[$i])->first();
                $save = new ProductStock;
                $save->qty_stock = $request->qty_stock[$i];
                $save->id_product = $request->id_product[$i];
                $save->id_distributor = $request->id_distributor[$i];
                $save->nomor_order_stock = $nomor_order_stock;
                $save->harga = $harga->harga;
                $save->status = 'Request';
                $save->save();
            }
  $total_harga = DB::table('v_stock_products_groupby')->select('total_harga')->where('nomor_order_stock',$nomor_order_stock)->first();
        $dataSet[] = [
            'nomor_order_stock'  => $nomor_order_stock,
            'jenis'    => 'Belum',
            'total_harga'       => $total_harga->total_harga,
            'tanggal_pembayaran' => $hariOrder,
        ];
            \DB::table('payments')->insert($dataSet);
        
            toast('Data berhasil dimasukkan pada nomor '.$nomor_order_stock.'','success');
        return redirect()->route('warehouse.index');
    }
    public function dataAjaxStock(Request $request,$id)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            
                    $data = \DB::table('v_harga_produk')->select('id_product','nama_product as nama')
                    ->where('nama_product','LIKE',"%$search%")
                    ->where('id_distributor',$id)
                    ->get();
        }
        return response()->json($data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = DB::table('v_stock_products')->where('id_product',$id)->orderBy('created_at','desc')->get();
        $pbf_items = DB::table('v_stock_products')->selectRaw('sum(qty_stock) as jumlahStok,id_product,id_distributor, nama_product,nama_distributor')->where('id_product',$id)->where('status','Accept')->groupBy('nama_distributor')->get();
        $harga_items = DB::table('v_harga_produk')->where('id_product',$id)->groupBy('nama_distributor')->get();
        // Cek total pengeluaran
        $order_items = DB::table('v_order_products_user')->selectRaw('cabang, sum(qty) as jumlah_order, sum(qty*harga_order) as total')->where('id_product',$id)->where('status_order','!=','Keranjang')->groupBy('cabang')->get();
        // Cek per transaksi 
        $trans = DB::table('v_order_user_cabang')->where('id_product',$id)->where('status_order','Selesai')->get();

        $products = $items[0]->nama_product;
        $title = "Product Details for ".$products;

        return view('pages.admin.productStock.show',compact('items','title','pbf_items','harga_items','order_items','trans'));
    }
    public function showDetail($id){
        $nomor = str_replace("-","/",$id);
        $items = DB::table('v_stock_products')->where('nomor_order_stock',$nomor)->get();
        $cekItems = DB::table('payments')->where('nomor_order_stock',$nomor)->first();

        return view('pages.admin.productStock.detail',compact('items','nomor','cekItems'));

    }
    public function showDetailTransactional($id){
        $nomor = str_replace("-","/",$id);
        $items = DB::table('v_stock_products')->where('nomor_order_stock',$nomor)->get();
        $items1 = DB::table('v_stock_products')->where('nomor_order_stock',$nomor)->first();
        $title = "List Details for ".$nomor;


        return view('pages.admin.productStock.showTrans',compact('items','nomor','id','title','items1'));
    }
    public function getTransRequest($id){
        $nomor = str_replace("-","/",$id);
        $items = DB::table('v_stock_products')
            ->where('nomor_order_stock',$nomor)
            ->where('status',"Request")
            ->get();
        return json_encode(array('data'=>$items));
    }
    public function getTransArrive($id){
        $nomor = str_replace("-","/",$id);
        $items = DB::table('v_stock_products')
            ->where('nomor_order_stock',$nomor)
            ->where('status',"Accept")
            ->get();
        return json_encode(array('data'=>$items));
    }
    public function updateToTransArrive($id){
        DB::table('product_stocks')->where('id_product_stock',$id)->update(['status' => 'Accept']);
        return json_encode(array('statusCode'=>200));
    }
    public function updateToTransRequest($id){
        DB::table('product_stocks')->where('id_product_stock',$id)->update(['status' => 'Request']);
        return json_encode(array('statusCode'=>200));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nomor = str_replace("-","/",$id);
        $data = $request->except(['_token', '_method' ]);
        $item =  DB::table('product_stocks')->where('nomor_order_stock',$nomor)->update($data);
       Alert::toast('Nomor Faktur Berhasil Ditambahkan', 'success');
       return redirect()->route('warehouse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
