<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\ProductStock;
use Alert;

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
        $nomor_order_stock = sprintf("%03s", abs($nomorUrut + $satu))."/"."GDG"."/".$today;
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
        $pbf_items = DB::table('v_stock_products')->selectRaw('sum(qty_stock) as jumlahStok,id_product,id_distributor, nama_product,nama_distributor')->where('id_product',$id)->groupBy('nama_distributor')->get();
        $harga_items = DB::table('v_order_products_user')->where('id_product',$id)->groupBy('nama_distributor')->get();
        // Cek total pengeluaran
        $order_items = DB::table('v_order_products_user')->selectRaw('cabang, sum(qty) as jumlah_order, sum(qty*harga_order) as total')->where('id_product',$id)->where('status_order','!=','Keranjang')->groupBy('cabang')->get();

        $products = $items[0]->nama_product;
        $title = "Product Details for ".$products;

        return view('pages.admin.productStock.show',compact('items','title','pbf_items','harga_items','order_items'));
    }
    public function showDetail($id){
        $nomor = str_replace("-","/",$id);
        $items = DB::table('v_stock_products')->where('nomor_order_stock',$nomor)->get();

        return view('pages.admin.productStock.detail',compact('items','nomor'));

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
        //
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
