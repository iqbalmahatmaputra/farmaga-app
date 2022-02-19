<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\ProductStock;

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
        $items = DB::table('distributors')
        ->select('*')->get();
        return view('pages.admin.productStock.create',[
            'items' => $items
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
        
        $data = array();

        $hitung = count($request->id_product);
        
            for($i=0;$i<$hitung;$i++)
            {
                
                $save = new ProductStock;
                $save->qty_stock = $request->qty_stock[$i];
                $save->id_product = $request->id_product[$i];
                $save->id_distributor = $request->id_distributor[$i];
                $save->save();
            }
        

        return redirect()->route('productStock.index');
    }
    public function dataAjaxStock(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            
                    $data = \DB::table('products')->select('id_product','nama_product as nama')
                    ->where('nama_product','LIKE',"%$search%")
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
        $products = $items[0]->nama_product;
        $title = "Product Details for ".$products;

        return view('pages.admin.productStock.show',compact('items','title','pbf_items','harga_items'));
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
