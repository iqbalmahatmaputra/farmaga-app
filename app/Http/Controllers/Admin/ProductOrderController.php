<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\Admin\ProductOrderRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;




class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('product_orders')->get();
        return view('pages.admin.productOrder.index',[
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
        return view('pages.admin.productOrder.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cariId = \DB::table('v_harga_produk')->select('id_product_price','id_product','id_distributor','harga')
                    ->where('id_product_price',$request->id_product_price)
                    ->first();
        $today = date('Y.m.d');
        $hariOrder = date('Y-m-d');
        $nomorUrut = \DB::table('product_orders')->where('created_at','LIKE',"$hariOrder%")->count();
       $satu = 1;
        $nomor_order = sprintf("%03s", abs($nomorUrut + $satu))."/".Auth::user()->cabang."/".$today;

        $data = array();
        $data['id_product_price'] = $request->id_product_price;
        $data['qty'] = $request->qty;
        $data['id_product'] = $cariId->id_product;
        $data['id_distributor'] = $cariId->id_distributor;
        $data['harga_order'] = $cariId->harga;
        $data['status_order'] = 'Request';
        $data['id_user'] = Auth::user()->id;
        $data['nomor_order'] = $nomor_order;
    	DB::table('product_orders')->insert($data);

        return redirect()->route('productOrder.index');


    }
    public function AddMoreOrder(Request $request)
    {
        $today = date('Y.m.d');
        $hariOrder = date('Y-m-d');
        $satu = 1;
        $nomorUrut = \DB::table('product_orders')->where('created_at','LIKE',"$hariOrder%")->where('id_user',Auth::user()->id)->count();
        $nomor_order = sprintf("%03s", abs($nomorUrut + $satu))."/".Auth::user()->cabang."/".$today;
        $data = array();
        foreach ($request->addmore as $key => $value) {
            $cariId = \DB::table('v_harga_produk')->select('id_product_price','id_product','id_distributor','harga')
            ->where('id_product_price',$request->id_product_price)
            ->first();
            
            $data['id_product_price'] = $request->id_product_price;
            $data['qty'] = $request->qty;
            $data['id_product'] = $cariId->id_product;
            $data['id_distributor'] = $cariId->id_distributor;
            $data['harga_order'] = $cariId->harga;
            $data['status_order'] = 'Request';
            $data['id_user'] = Auth::user()->id;
            $data['nomor_order'] = $nomor_order;
        }
    	DB::table('product_orders')->insert($data);

        return redirect()->route('productOrder.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function dataAjaxProduct(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            
                    $data = \DB::table('v_harga_produk')->select('id_product_price',DB::raw("CONCAT(nama_product,' - ',nama_distributor) as nama"))
                    ->where('nama_product','LIKE',"%$search%")
                    ->orwhere('nama_distributor','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }
    public function dataAjaxDistributor(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            
                    $data = \DB::table('v_harga_produk')->select('id_distributor','nama_distributor')
                    ->where('nama_distributor','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }
}
